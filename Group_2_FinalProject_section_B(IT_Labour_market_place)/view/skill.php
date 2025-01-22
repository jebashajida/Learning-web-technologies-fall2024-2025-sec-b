<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skill Assessment and Development</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        select,
        input,
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: #007BFF;
            color: white;
            cursor: pointer;
            border: none;
        }

        button:hover {
            background-color: #0056b3;
        }

        .resources,
        .progress,
        .certificate {
            margin-top: 30px;
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
        }

        .resources h2,
        .progress h2,
        .certificate h2 {
            margin-top: 0;
        }
    </style>
</head>

<body>
    <div id="header"></div>
    <div class="container">
        <h1>Skill Assessment and Development</h1>
        <form id="skillForm">
            <label for="skill">Select Skill</label>
            <select id="skill" name="skill" required>
                <option value="web_development">Web Development</option>
                <option value="data_science">Data Science</option>
                <option value="graphic_design">Graphic Design</option>
            </select>
            <label for="level">Proficiency Level</label>
            <select id="level" name="level" required>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>
            <button type="submit">Start Test</button>
        </form>
        <div class="resources">
            <h2>Skill Development Resources</h2>
            <p>Access tutorials, courses, and exercises tailored to your level:</p>
            <ul>
                <li><a href="#">Beginner Tutorials</a></li>
                <li><a href="#">Intermediate Challenges</a></li>
                <li><a href="#">Advanced Projects</a></li>
            </ul>
        </div>
        <div class="progress">
            <h2>Your Progress</h2>
            <p>Track your skill improvement:</p>
            <ul>
                <li>Current Level: Beginner</li>
                <li>Completed Tests: 2</li>
                <li>Next Goal: Intermediate Level Certification</li>
            </ul>
        </div>
        <div class="certificate">
            <h2>Certificate of Achievement</h2>
            <p>Earn a certificate after completing the test:</p>
            <button>Download Certificate</button>
        </div>
    </div>
    <div id="footer"></div>
</body>

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

</html>