<?php
include_once('./config.php'); // Loads session & LEGACY_ROOT
include_once(LEGACY_ROOT . '/lib/AccessControl.php');

// Restrict access to employees only
AccessControl::denyIfNot(AccessControl::isEmployee());

// Optional: load user info
$firstName = isset($_SESSION['firstName']) ? $_SESSION['firstName'] : 'User';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employee Onboarding Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8f8f8;
            padding: 2rem;
        }
        .container {
            background: white;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
            padding: 2rem;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        .section {
            margin-top: 1.5rem;
        }
        .card {
            background: #f2f2f2;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($firstName); ?> 👋</h1>
        <p>This is your personalized onboarding and employee experience portal.</p>

        <div class="section">
            <h2>📋 Onboarding Checklist</h2>
            <div class="card">☑️ Complete your tax documents</div>
            <div class="card">☑️ Upload a photo for your badge</div>
            <div class="card">⬜ Watch the employee welcome video</div>
        </div>

        <div class="section">
            <h2>📞 Internal Communications</h2>
            <div class="card">
                You are connected via our Nextiva phone system. Call logs and voicemails will soon be viewable here.
            </div>
        </div>

        <div class="section">
            <h2>📁 Helpful Documents</h2>
            <ul>
                <li><a href="/docs/employee-handbook.pdf" target="_blank">Employee Handbook</a></li>
                <li><a href="/docs/code-of-conduct.pdf" target="_blank">Code of Conduct</a></li>
            </ul>
        </div>
    </div>
</body>
</html>
