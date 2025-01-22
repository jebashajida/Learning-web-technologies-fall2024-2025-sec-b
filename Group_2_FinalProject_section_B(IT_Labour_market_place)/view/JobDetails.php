<?php
session_start();
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .job-details {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .job-details h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .job-details p {
            margin: 5px 0;
            font-size: 16px;
        }

        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-button:hover {
            background-color: #45a049;
        }

        .apply-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 15px;
            font-size: 16px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .apply-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="header"></div>

    <div class="job-details" id="job-details">
        <h1 id="job-title">Loading...</h1>
        <p id="job-type"></p>
        <p id="job-company"></p>
        <p id="job-pay"></p>
        <p id="job-applications"></p>
        <p id="job-description"></p>
        <a href="Dashboard.php" class="back-button">Back to Dashboard</a>
        <button class="apply-button" id="apply-button">Apply for Job</button>
    </div>

    <div id="footer"></div>

    <script>
        function loadHeaderFooter() {
            fetch('getHeader.php')
                .then(response => response.text())
                .then(data => document.getElementById('header').innerHTML = data)
                .catch(error => console.error('Error loading header:', error));

            fetch('footer.php')
                .then(response => response.text())
                .then(data => document.getElementById('footer').innerHTML = data)
                .catch(error => console.error('Error loading footer:', error));
        }

        const urlParams = new URLSearchParams(window.location.search);
        const jobId = urlParams.get('id');

        function loadJobDetails() {
            if (!jobId) {
                document.getElementById('job-details').innerHTML = '<p>Invalid job ID.</p>';
                return;
            }

            fetch('../controller/jobdet_val.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=get_job&id=${jobId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data) {
                    document.getElementById('job-title').textContent = data.title;
                    document.getElementById('job-type').textContent = `Type: ${data.type}`;
                    document.getElementById('job-company').textContent = `Company: ${data.company}`;
                    document.getElementById('job-pay').textContent = `Pay: ${data.pay}`;
                    document.getElementById('job-applications').textContent = `${data.applications} applications submitted`;
                    document.getElementById('job-description').textContent = data.description || 'No description available.';
                } else {
                    document.getElementById('job-details').innerHTML = '<p>Job not found.</p>';
                }
            })
            .catch(error => {
                console.error('Error fetching job details:', error);
                document.getElementById('job-details').innerHTML = '<p>Error loading job details.</p>';
            });
        }

        function applyForJob() {
            if (!jobId) {
                alert('Invalid job ID.');
                return;
            }

            fetch('../controller/jobdet_val.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: `action=apply_job&id=${jobId}`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Application submitted successfully!');
                    addToJobHistory(jobId);
                    loadJobDetails();
                } else {
                    alert('Failed to submit application: ' + (data.error || 'Unknown error'));
                }
            })
            .catch(error => {
                console.error('Error applying for job:', error);
                alert('An error occurred while submitting the application.');
            });
        }

        function addToJobHistory(jobId) {
        fetch('../controller/jobhis_val.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: `action=add_job_history&id=${jobId}`
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                
            } else {
                console.error('Failed to add job to history:', data.error || 'Unknown error');
            }
        })
        .catch(error => {
            console.error('Error adding job to history:', error);
        });
}

        window.onload = function() {
            loadHeaderFooter();
            loadJobDetails();
             document.getElementById('apply-button').addEventListener('click', applyForJob);
        };
    </script>
</body>
</html>

<?php
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>
