<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Seeker Dashboard</title>
    <style>
        body {
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
        .dashboard-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .profile-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            border: 1px solid #ddd;
            padding: 20px;
            width: 300px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .profile-section img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .profile-section p {
            margin: 5px 0;
        }
        .ratings-reviews {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            border: 1px solid #ddd;
            padding: 20px;
            margin-top: 20px;
            width: 500px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .ratings-reviews h3 {
            margin-bottom: 10px;
        }
        .ratings-reviews .review {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .ratings-reviews .review span {
            margin-left: 10px;
        }
        .ratings-reviews .show-all {
            margin-top: 10px;
            text-decoration: underline;
            color: blue;
            cursor: pointer;
        }
        .dashboard-banner {
            margin-top: 20px;
            padding: 20px;
            width: 100%;
            text-align: center;
            background-color: #ddd;
            font-weight: bold;
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
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <span>♠♣♦♥</span>
        </div>
        <div>
            <a href="#">Home</a>
            <a href="#">Contracts and Agreements</a>
            <a href="#">Budgeting</a>
            <a href="#">Blog</a>
            <a href="#">Contact us</a>
        </div>
        <div>
            <button class="post-job-button">Post A Job</button>
            <div class="user-icon">
                <span>👤</span>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="profile-section">
            <img src="https://via.placeholder.com/100" alt="User Profile">
            <p><strong>Job Seeker 1</strong></p>
            <p>User Information</p>
            <p>Phone number</p>
            <p>Email</p>
            <p>Etc.</p>
        </div>
        <div class="ratings-reviews">
            <h3>Ratings & Reviews</h3>
            <div class="review">
                <span>⭐⭐⭐⭐⭐</span>
                <span>Comments...</span>
            </div>
            <div class="review">
                <span>⭐⭐⭐⭐⭐</span>
                <span>Comments...</span>
            </div>
            <div class="review">
                <span>⭐⭐⭐⭐⭐</span>
                <span>Comments...</span>
            </div>
            <div class="show-all">Show All</div>
        </div>
        <div class="dashboard-banner">
            Job Seeker Dashboard (Visitor View)
        </div>
    </div>

    <footer class="footer">
        <div>
            <h4>Company</h4>
            <a href="#">How It Works</a>
            <a href="#">Pricing</a>
            <a href="#">Docs</a>
        </div>
        <div>
            <h4>Resources</h4>
            <a href="#">Blog Post Name List Goes Here</a>
            <a href="#">Blog Post Name List Goes Here</a>
            <a href="#">Blog Post Name List Goes Here</a>
            <a href="#">See All Resources ></a>
        </div>
        <div>
            <h4>About</h4>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
            <div>
                <a href="#">Twitter</a>
                <a href="#">LinkedIn</a>
                <a href="#">Facebook</a>
            </div>
        </div>
        <div class="copyright">
            Copyright © 2024 Company name
        </div>
    </footer>
</body>
</html>