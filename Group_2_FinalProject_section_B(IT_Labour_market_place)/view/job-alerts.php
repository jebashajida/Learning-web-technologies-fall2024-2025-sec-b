<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Alerts Setup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            color: #4CAF50;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input, select, button {
            font-size: 16px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
        }

        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .alert-list {
            margin-top: 20px;
        }

        .alert-list h2 {
            text-align: left;
        }

        .alert-item {
            background: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .alert-item p {
            margin: 5px 0;
        }

        .alert-item button {
            background-color: #ff4d4d;
        }

        .alert-item button:hover {
            background-color: #e63939;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Create Job Alerts</h1>
        <form id="job-alert-form">
            <label for="job-title">Job Title:</label>
            <input type="text" id="job-title" name="jobTitle" placeholder="Enter job title" required>

            <label for="location">Location:</label>
            <input type="text" id="location" name="location" placeholder="Enter location" required>

            <label for="salary-range">Salary Range:</label>
            <select id="salary-range" name="salaryRange">
                <option value="">Select salary range</option>
                <option value="0-50k">0 - 50k</option>
                <option value="50k-100k">50k - 100k</option>
                <option value="100k-150k">100k - 150k</option>
                <option value="150k+">150k+</option>
            </select>

            <button type="submit">Create Alert</button>
        </form>

        <div class="alert-list">
            <h2>Your Job Alerts</h2>
        </div>
    </div>

    <script>
        const form = document.getElementById('job-alert-form');
        const alertList = document.querySelector('.alert-list');

        form.addEventListener('submit', (event) => {
            event.preventDefault();

            const jobTitle = document.getElementById('job-title').value;
            const location = document.getElementById('location').value;
            const salaryRange = document.getElementById('salary-range').value;

            const alertData = {
                jobTitle,
                location,
                salaryRange
            };

            fetch('addAlert', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(alertData)
            })
                .then(response => response.json())
                .then(data => {
                    const alertItem = document.createElement('div');
                    alertItem.className = 'alert-item';

                    alertItem.innerHTML = `
                        <p><strong>Job Title:</strong> ${data.jobTitle}</p>
                        <p><strong>Location:</strong> ${data.location}</p>
                        <p><strong>Salary Range:</strong> ${data.salaryRange}</p>
                        <button>Delete Alert</button>
                    `;

                    alertList.appendChild(alertItem);

                    alertItem.querySelector('button').addEventListener('click', () => {
                        fetch('deleteAlert', {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({ jobTitle: data.jobTitle })
                        })
                            .then(() => {
                                alertItem.remove();
                            });
                    });
                    form.reset();
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    </script>
</body>
</html>