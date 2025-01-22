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
    <title>Form Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
    </style>
</head>
<body>
    <div id="header"></div>

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

        window.onload = function() {
        loadHeaderFooter();
    };
    </script>
</body>
</html>