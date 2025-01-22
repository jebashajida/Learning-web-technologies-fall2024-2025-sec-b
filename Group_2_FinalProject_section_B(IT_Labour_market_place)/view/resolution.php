<?php
session_start();
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispute Resolution System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            color: #555;
        }

        select, textarea, input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #statusUpdate {
            margin-top: 30px;
            padding: 15px;
            background: #f1f1f1;
            border-radius: 8px;
        }

        #statusUpdate h2 {
            margin-top: 0;
        }

        #statusMessage {
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>
    <div id="header"></div>
    <div class="container">
        <h1>Dispute Resolution System</h1>
        <form id="disputeForm">
            <label for="userType">I am a:</label>
            <select id="userType" name="userType" required>
                <option value="employer">Employer</option>
                <option value="freelancer">Job-Seeker</option>
            </select>

            <label for="disputeDetails">Dispute Details:</label>
            <textarea id="disputeDetails" name="disputeDetails" rows="6" required></textarea>

            <label for="contactInfo">Contact Information:</label>
            <input type="email" id="contactInfo" name="contactInfo" placeholder="Your Email" required>

            <button type="button" id="submitButton">Submit Dispute</button>
        </form>
        <div id="statusUpdate">
            <h2>Dispute Status</h2>
            <div id="statusMessage">No updates yet.</div>
        </div>
    </div>
    <div id="footer"></div>
    <script>
        document.getElementById('submitButton').addEventListener('click', function () {
            const userType = document.getElementById('userType').value;
            const disputeDetails = document.getElementById('disputeDetails').value;
            const contactInfo = document.getElementById('contactInfo').value;

            const requestData = {
                userType: userType,
                disputeDetails: disputeDetails,
                contactInfo: contactInfo
            };

            fetch('../controller/resol_ver.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(requestData)
            })
            .then(response => response.json())
            .then(data => {
                const statusMessage = document.getElementById('statusMessage');
                if (data.success) {
                    statusMessage.textContent = 'Dispute submitted successfully. Status: ' + data.status;
                    statusMessage.style.color = 'green';
                } else {
                    statusMessage.textContent = 'Error: ' + data.message;
                    statusMessage.style.color = 'red';
                }
            })
            .catch(error => {
                const statusMessage = document.getElementById('statusMessage');
                statusMessage.textContent = 'An error occurred while submitting the dispute.';
                statusMessage.style.color = 'red';
                console.error('Error:', error);
            });
        });

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
        window.onload = function() {
            loadHeaderFooter();
            loadJobDetails();
        };
    </script>
</body>
</html>