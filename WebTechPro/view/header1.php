<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>J</title>
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

        .notification-panel {
            display: none;
            position: absolute;
            right: 0;
            top: 35px;
            background-color: #ffffff;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            border: 1px solid #ddd;
            width: 250px;
            z-index: 2;
            padding: 10px;
        }
        .notification-panel h4 {
            margin: 0 0 10px 0;
            font-size: 16px;
            color: #333;
        }
        .notification-panel p {
            margin: 5px 0;
            font-size: 14px;
            color: #555;
        }
        .notification-panel p:hover {
            background-color: #f1f1f1;
            cursor: pointer;
        }
        .notification-icon {
            margin-left: 10px;
            font-size: 18px;
            cursor: pointer;
        }
        .notification-badge {
            position: absolute;
            top: 5px;
            right: 5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 12px;
        }
        </style>
</head>

<body>
    <nav class="navbar"> <div class="logo">
            <span>🔧</span>
        </div>
        <div>
            <a href="#">Home</a>
            <div class="dropdown">
                <a href="#" class="dropbtn">Contracts and Agreements</a>
                <div class="dropdown-content">
                    <a href="#">Item One</a>
                    <a href="#">Item Two</a>
                    <a href="#">Item Three</a>
                    <a href="#">Item Four</a>
                    <a href="#">Item Five</a>
                    <a href="#">Item Six</a>
                    <a href="#">Item Seven</a>
                    <a href="#">Item Eight</a>
                    <a href="#">Item Nine</a>
                </div>
            </div>
            <a href="#">Budgeting</a>
            <a href="#">Blog</a>
            <a href="#">Contact us</a>
        </div>
        <div>
            <button class="post-job-button" onclick="location.href='PostJob.php'">Post A Job</button>
            <a href="profile.php">
                <div class="user-icon">
                    <span>👤</span>
                </div>
            </a>
            <div class="user-icon">
                <span class="notification-icon">🔔</span>
            
                    <div class="notification-panel">
                        <h4>Notifications</h4>
                        <p>New job posted: Web Developer</p>
                        <p>Your application has been reviewed</p>
                        <p>Update your profile for more visibility</p>
                    </div>
            </div> 
        </div>    
    </nav>

    <script>
        const notificationIcon = document.querySelector('.notification-icon');
        const notificationPanel = document.querySelector('.notification-panel');

        notificationIcon.addEventListener('click', () => {
            notificationPanel.style.display = 
                notificationPanel.style.display === 'block' ? 'none' : 'block';
        });

        window.addEventListener('click', (event) => {
            if (!notificationIcon.contains(event.target) && !notificationPanel.contains(event.target)) {
                notificationPanel.style.display = 'none';
            }
        });
    </script>
</body>

<?php
    session_start();
?>