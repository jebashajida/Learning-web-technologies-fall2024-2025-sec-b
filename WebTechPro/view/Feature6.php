<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Selection</title>
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
        .form-selection-container {
            display: flex;
            padding: 20px;
        }
        .form-list {
            flex: 1;
            margin-right: 20px;
        }
        .form-list h2 {
            margin-bottom: 10px;
        }
        .form-list ul {
            list-style-type: none;
            padding: 0;
        }
        .form-list li {
            margin-bottom: 10px;
        }
        .form-preview {
            flex: 2;
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #f9f9f9;
        }
        .form-preview iframe {
            width: 100%;
            height: 300px;
            border: none;
        }
        .form-inputs {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
        }
        .form-inputs h3 {
            margin-bottom: 10px;
        }
        .form-inputs label {
            display: block;
            margin-bottom: 5px;
        }
        .form-inputs input, .form-inputs select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .footer {
            background-color: #f9f9f9;
            padding: 20px;
            border-top: 1px solid #ddd;
            display: flex;
            justify-content: space-around;
            align-items: flex-start;
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
    </nav>

    <div class="form-selection-container">
        <div class="form-list">
            <h2>Form Selection</h2>
            <ul>
                <li><label><input type="radio" name="form" value="Form 1"> Agreement Form 1</label></li>
                <li><label><input type="radio" name="form" value="Form 2"> Agreement Form 2</label></li>
                <li><label><input type="radio" name="form" value="Form 3"> Agreement Form 3</label></li>
            </ul>
        </div>
        <div class="form-preview">
            <h2>Form Preview</h2>
            <iframe src="https://via.placeholder.com/600x300" title="Form Preview"></iframe>
        </div>
    </div>

    <div class="form-inputs">
        <h3>Input Fields</h3>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <label for="comments">Comments:</label>
        <input type="text" id="comments" name="comments">
        <label for="status">Status:</label>
        <select id="status" name="status">
            <option value="pending">Pending</option>
            <option value="approved">Approved</option>
            <option value="rejected">Rejected</option>
        </select>
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
            <a href="#">Blog Post Name</a>
            <a href="#">See All Resources ></a>
        </div>
        <div>
            <h4>About</h4>
            <a href="#">Terms & Conditions</a>
            <a href="#">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>