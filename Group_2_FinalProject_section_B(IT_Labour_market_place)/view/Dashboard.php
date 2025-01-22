<?php
session_start();
if (!isset($_COOKIE['user'])) {
   header('Location: login.php');
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Dashboard</title>
    <style>body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f9f9f9;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .navbar a {
            text-decoration: none;
            color: black;
            padding: 10px 15px;
        }
        .navbar a:hover {
            background-color: #e0e0e0;
        }
        .dropdown {
            position: relative;
            display: inline-block;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: calc(100% + 5px);
            left: 0;
            background-color: #ffffff;
            width: 500px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
            border: 1px solid #ddd;
            padding: 10px;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }
        .dropdown-content a {
            color: black;
            padding: 5px 10px;
            display: block;
            text-decoration: none;
        }
        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }
        .dropdown:hover .dropdown-content {
            display: grid;
        }
        .dropdown:hover .dropbtn {
            background-color: #e0e0e0;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .user-icon {
            display: flex;
            align-items: center;
            cursor: pointer;
        }
        .user-icon img {
            width: 24px;
            height: 24px;
            border-radius: 50%;
        }
        .post-job-button {
            padding: 5px 10px;
            border: 1px solid black;
            background-color: #f9f9f9;
            cursor: pointer;
            margin-right: 10px;
        }
        .post-job-button:hover {
            background-color: #e0e0e0;
        }
        .navbar > div:last-child {
            display: flex;
            align-items: center;
        }
        .job-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
        }
        .job-box {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(20, 20, 20, 0.1);
            cursor: pointer;
            transition: transform 0.2s;
        }
        .job-box:hover {
            transform: scale(1.05);
            box-shadow: 0px 6px 8px rgba(0, 0, 0, 0.2);
        }
        .job-box h3 {
            margin: 10px 0;
        }
        .job-box p {
            margin: 5px 0;
            font-size: 14px;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
        }
        .footer div {
            flex: 1;
            padding: 0 20px;
        }
        .footer h4 {
            margin-bottom: 10px;
        }
        .footer a {
            text-decoration: none;
            color: black;
            display: block;
            margin-bottom: 5px;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        .footer .copyright {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
        
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 20px 0;
        }

        #search-box {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 300px;
            margin-right: 10px;
        }

        #search-button {
            padding: 10px 20px;
            font-size: 16px;
            background-color:rgb(80, 39, 228);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #search-button:hover {
            background-color:rgb(12, 35, 138);
        }

        </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div id="header"></div>

    <div class="search-container">
        <input type="text" id="search-box" placeholder="Search jobs by type...">
        <button id="search-button">Search</button>
    </div>


    <div class="job-container" id="job-container"></div>

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

        function loadJobs(filter = '') {
            $.ajax({
                url: '../controller/dashboard_val.php',
                method: 'POST',
                data: { action: 'get_jobs', filter: filter },
                dataType: 'json',
                success: function (data) {
                    let jobContainer = $('#job-container');
                    jobContainer.empty();
                    if (data.length > 0) {
                        data.forEach(job => {
                            jobContainer.append(`
                                <div class="job-box" onclick="location.href='JobDetails.php?id=${job.id}'">
                                    <h3>${job.title}</h3>
                                    <p>Type: ${job.type}</p>
                                    <p>Company: ${job.company}</p>
                                    <p>Pay: ${job.pay}</p>
                                    <p>${job.applications} applications submitted</p>
                                </div>
                            `);
                        });
                    } else {
                        jobContainer.append('<p>No jobs found.</p>');
                    }
                }
            });
        }

        $(document).ready(function () {
            loadJobs();

            $('#search-button').click(function () {
                let filter = $('#search-box').val();
                loadJobs(filter);
            });
        });

        window.onload = function() {
            loadHeaderFooter();
            loadJobDetails();
        };
    </script>
</body>
</html>


