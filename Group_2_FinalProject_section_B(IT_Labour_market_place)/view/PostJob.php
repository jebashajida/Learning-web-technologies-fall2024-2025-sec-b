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
    <title>Post a Job</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .post-job {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .post-job h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .post-job label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .post-job input, .post-job textarea, .post-job select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .post-job button {
            padding: 10px 15px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .post-job button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div id="header"></div>

    <div class="post-job">
        <h1>Post a Job</h1>
        <form id="post-job-form">
            <label for="title">Job Title</label>
            <input type="text" id="title" name="title" required>

            <label for="type">Job Type</label>
            <select id="type" name="type" required>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Freelance">Freelance</option>
            </select>

            <label for="company">Company</label>
            <input type="text" id="company" name="company" required>

            <label for="pay">Pay</label>
            <input type="number" id="pay" name="pay" step="0.01" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <button type="submit">Post Job</button>
        </form>
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

        document.getElementById('post-job-form').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            formData.append('action', 'post_job'); 

            fetch('../controller/jobpost_val.php', {
                method: 'POST',
                body: new URLSearchParams(formData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Job posted successfully!');
                    this.reset();
                } else {
                    alert('Failed to post job: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error posting job:', error);
                alert('An error occurred while posting the job.');
            });
        });

        window.onload = loadHeaderFooter;
    </script>
</body>
</html>


<?php
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>