<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Portfolio</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input, textarea, button {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        textarea {
            resize: vertical;
            height: 100px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .portfolio-list {
            margin-top: 20px;
        }

        .portfolio-item {
            background: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .portfolio-item h3 {
            margin-top: 0;
        }

        .portfolio-item p {
            margin: 5px 0;
        }

        .testimonial {
            margin-top: 20px;
            background: #e9f7e9;
            padding: 10px;
            border-left: 5px solid #4CAF50;
            border-radius: 5px;
        }

        .portfolio-item button {
            background-color: #ff4d4d;
        }

        .portfolio-item button:hover {
            background-color: #e63939;
        }
    </style>
</head>
<body>
    <div id="header"></div>
    <div class="container">
        <h1>Freelancer Portfolio</h1>

        <form id="portfolio-form">
            <label for="project-title">Project Title:</label>
            <input type="text" id="project-title" name="projectTitle" placeholder="Enter project title" required>

            <label for="project-description">Project Description:</label>
            <textarea id="project-description" name="projectDescription" placeholder="Describe the project" required></textarea>

            <label for="skills-used">Skills Used:</label>
            <input type="text" id="skills-used" name="skillsUsed" placeholder="E.g., HTML, CSS, JavaScript">

            <label for="testimonial">Client Testimonial:</label>
            <textarea id="testimonial" name="testimonial" placeholder="Enter client testimonial"></textarea>

            <button type="submit">Add to Portfolio</button>
        </form>

        <div class="portfolio-list">
            <h2>Your Portfolio</h2>
        </div>
    </div>
    <div id="footer"></div>

    <script>
        const form = document.getElementById('portfolio-form');
        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const projectTitle = document.getElementById('project-title').value;
            const projectDescription = document.getElementById('project-description').value;
            const skillsUsed = document.getElementById('skills-used').value;
            const testimonial = document.getElementById('testimonial').value;

            const requestData = {
                projectTitle: projectTitle,
                projectDescription: projectDescription,
                skillsUsed: skillsUsed,
                testimonial: testimonial
            };

            fetch('../controller/submit_portofolio.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(requestData)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const portfolioList = document.querySelector('.portfolio-list');
                    const portfolioItem = document.createElement('div');
                    portfolioItem.className = 'portfolio-item';

                    portfolioItem.innerHTML = `
                        <h3>${projectTitle}</h3>
                        <p><strong>Description:</strong> ${projectDescription}</p>
                        <p><strong>Skills:</strong> ${skillsUsed}</p>
                        ${testimonial ? `<div class="testimonial"><p>"${testimonial}"</p></div>` : ''}
                        <button>Delete Project</button>
                    `;

                    portfolioList.appendChild(portfolioItem);

                    portfolioItem.querySelector('button').addEventListener('click', () => {
                        portfolioItem.remove();
                    });

                    form.reset();
                } else {
                    alert('Failed to add project: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while adding the project.');
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