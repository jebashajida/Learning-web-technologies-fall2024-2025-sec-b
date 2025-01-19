<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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
            padding: 20px;
        }
        .dashboard-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .dashboard-metrics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .metric-box {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
            text-align: center;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .metric-box h3 {
            margin: 0;
        }
        .metric-box p {
            margin: 10px 0;
            font-size: 14px;
            color: #555;
        }
        .charts {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-top: 20px;
        }
        .chart-box {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }
        .chart-box h4 {
            margin-bottom: 10px;
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
        <h1 class="dashboard-header">Dashboard</h1>
        <div class="dashboard-metrics">
            <div class="metric-box">
                <h3>12,869,323</h3>
                <p>Total Visits</p>
            </div>
            <div class="metric-box">
                <h3>26%</h3>
                <p>New Visits</p>
            </div>
            <div class="metric-box">
                <h3>32%</h3>
                <p>Avg Bounce Rate</p>
            </div>
            <div class="metric-box">
                <h3>168 sec</h3>
                <p>Avg Time on Page</p>
            </div>
        </div>
        <div class="charts">
            <div class="chart-box">
                <h4>Visits</h4>
                <img src="https://via.placeholder.com/400x200" alt="Visits Chart">
            </div>
            <div class="chart-box">
                <h4>Visits by Region</h4>
                <img src="https://via.placeholder.com/400x200" alt="Region Chart">
            </div>
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