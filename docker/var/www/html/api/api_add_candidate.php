<?php
header('Content-Type: application/json');

// --- AUTH (optional) ---
$API_KEY = 'YOUR_SECRET_KEY';
if ($_SERVER['HTTP_API_KEY'] !== $API_KEY) {
    http_response_code(403);
    echo json_encode(['error' => 'Unauthorized']);
    exit;
}

// --- Handle POST ---
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Only POST allowed']);
    exit;
}

// Parse form data (multipart/form-data)
$first_name = $_POST['first_name'] ?? '';
$last_name  = $_POST['last_name'] ?? '';
$email      = $_POST['email'] ?? '';
$phone      = $_POST['phone'] ?? '';

if (!$first_name || !$last_name || !$email) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing required fields']);
    exit;
}

// Handle file upload
if (isset($_FILES['resume']) && $_FILES['resume']['error'] === 0) {
    $resume_tmp = $_FILES['resume']['tmp_name'];
    $resume_name = basename($_FILES['resume']['name']);
    $resume_dest = '/var/www/html/attachments/' . $resume_name;

    move_uploaded_file($resume_tmp, $resume_dest);
    // Optional: invoke resume parser here
}

// Insert into OpenCATS DB (simplified)
$conn = new mysqli('opencats-db', 'opencats_user', 'opencats_pass', 'opencats_db');
$stmt = $conn->prepare("INSERT INTO candidates (first_name, last_name, email, phone) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $first_name, $last_name, $email, $phone);
$stmt->execute();

$candidate_id = $stmt->insert_id;
$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'candidate_id' => $candidate_id]);
