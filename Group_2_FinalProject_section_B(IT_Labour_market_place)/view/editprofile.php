<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            height: 100vh;
            overflow-y: auto;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
            padding: 20px;
            margin: 20px 0;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #555;
            font-size: 14px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        input[type="file"],
        button,
        input[type="submit"],
        input[type="radio"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        button,
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover,
        input[type="submit"]:hover {
            background-color: #45a049;
        }

        img {
            display: block;
            margin: 0 auto 15px;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        .form-footer {
            text-align: center;
            font-size: 12px;
            color: #777;
        }

        .links {
            text-align: center;
            margin-top: 10px;
        }

        .links a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 14px;
        }

        .links a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Edit Profile</h2>
        <form method="POST" action="../controller/edit.php">
            <label>Name:</label>
            <input type="text" name="name" value="" required>

            <label>Email:</label>
            <input type="email" name="email" value="" required>

            <label>Phone:</label>
            <input type="text" name="phone" value="" required>

            <input type="submit" name="confirm" value="Confirm">
        </form>
    </div>

    <div class="container">
        <h2>Change Profile Picture</h2>
        <form method="POST" action="../controller/checkimage.php" enctype="multipart/form-data">
            <div>
                <label>Current Picture:</label><br>
                <img id="currentImage" src="../uploads/default.png" alt="Current Profile Picture" width="150"
                    height="150"><br><br>
            </div>
            <label for="file">Choose File:</label>
            <input type="file" name="profile_pic" id="file" required>
            <button type="submit" name="submit">Confirm</button>
        </form>
    </div>

    <div class="container">
        <h2>Change Password</h2>
        <form method="POST" action="../controller/checkpassword.php">
            <label>Current password:</label>
            <input type="password" name="cu_pass" required>
            <label>Password:</label>
            <input type="password" name="pass" required>
            <label>Retype-Password:</label>
            <input type="password" name="re_pass" required>
            <input type="submit" name="submit" value="Login">
        </form>
        <div class="links">
            <a href="profile.php">Go back to Home</a><br>
        </div>
    </div>
</body>

</html>
