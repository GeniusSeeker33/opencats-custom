# OpenCATS
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/948d67033d624e9382a332af20339c00)](https://www.codacy.com/app/OpenCATS/OpenCATS?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=opencats/OpenCATS&amp;utm_campaign=Badge_Grade)
[![Build Status](https://app.travis-ci.com/opencats/OpenCATS.svg?branch=master)](https://app.travis-ci.com/opencats/OpenCATS)
OpenCATS is a Free and Open Source Candidate/Applicant Tracking System designed for Recruiters to manage recruiting process from job posting, candidate application, through to candidate selection and submission.
More details: 
<http://www.opencats.org>
End user/Installation  documentation:
<https://documentation.opencats.org>
OpenCATS YouTube channel:
<https://www.youtube.com/channel/UChJ_YF1w74o8iWFAYa9w0xQ>
Support Forums:
<http://forums.opencats.org>
Issues:
[Open Issues](https://github.com/opencats/OpenCATS/issues?q=is%3Aopen)

# OpenCATS Custom with Docker
This is a customized deployment of OpenCATS ATS using Docker for easy local development and deployment.
## 🔧 How to Run
```bash
docker-compose up -d
Access the app at: http://localhost:8080
📂 Folder Structure
docker/: Docker volumes and config

attachments/, uploads/: Candidate resume uploads

api_add_candidate.php: Custom API endpoint (in progress)

.gitignore: Ensures sensitive data isn’t tracked

🚀 Custom Features (WIP)
Resume upload and parsing

JSON API to create candidates

Future: webhook and email integration
