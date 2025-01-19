<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Job History</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .job-history {
            margin-top: 20px;
        }
        .job-entry {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            background-color: #f7f7f7;
        }
        .job-entry h2 {
            margin: 0;
            color: #555;
        }
        .job-entry p {
            margin: 5px 0;
        }
        .actions {
            margin-top: 10px;
        }
        .actions button {
            margin-right: 10px;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .actions .edit {
            background-color: #4caf50;
            color: white;
        }
        .actions .delete {
            background-color: #f44336;
            color: white;
        }
        .add-job {
            text-align: center;
            margin: 20px 0;
        }
        .add-job button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-job button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="header"></div>
    <div class="container">
        <h1>Manage Job History</h1>
        <div class="add-job">
            <button onclick="openAddJobForm()">Add New Job</button>
        </div>
        <div class="job-history">
            <div class="job-entry">
                <h2>Software Developer at ABC Corp</h2>
                <p><strong>Duration:</strong> Jan 2018 - Dec 2020</p>
                <p><strong>Responsibilities:</strong> Developed web applications, maintained existing software, collaborated with cross-functional teams.</p>
                <p><strong>Achievements:</strong> Successfully launched 3 major projects, improved application performance by 30%.</p>
                <div class="actions">
                    <button class="edit" onclick="editJobEntry()">Edit</button>
                    <button class="delete" onclick="deleteJobEntry()">Delete</button>
                </div>
            </div>
        </div>
    </div>
    <div id="footer"></div>

    <script>
        function loadJobDetails() {
    fetch('get_job_history.php')
        .then(response => response.json())
        .then(jobs => {
            const jobHistoryContainer = document.querySelector('.job-history');
            
            const existingEntries = jobHistoryContainer.querySelectorAll('.job-entry:not(:first-child)');
            existingEntries.forEach(entry => entry.remove());

            jobs.forEach(job => {
                const jobEntry = document.createElement('div');
                jobEntry.className = 'job-entry';
                jobEntry.innerHTML = `
                    <h2>${job.title} at ${job.company}</h2>
                    <p><strong>Duration:</strong> ${job.start_date} - ${job.end_date}</p>
                    <p><strong>Responsibilities:</strong> ${job.responsibilities}</p>
                    <p><strong>Achievements:</strong> ${job.achievements}</p>
                    <div class="actions">
                        <button class="edit" onclick="editJobEntry(${job.id})">Edit</button>
                        <button class="delete" onclick="deleteJobEntry(${job.id})">Delete</button>
                    </div>
                `;
                jobHistoryContainer.appendChild(jobEntry);
            });
        })
        .catch(error => {
            console.error('Error loading job history:', error);
            const errorMessage = document.createElement('div');
            errorMessage.className = 'error-message';
            errorMessage.style.color = 'red';
            errorMessage.style.textAlign = 'center';
            errorMessage.style.marginTop = '20px';
            errorMessage.textContent = 'Failed to load job history. Please try again later.';
            document.querySelector('.job-history').appendChild(errorMessage);
        });
}
function editJobEntry(jobId) {
    fetch(`get_job_details.php?id=${jobId}`)
        .then(response => response.json())
        .then(jobDetails => {
            //ADD FORM HERE LATERRR
            alert(`Edit job entry with ID: ${jobId}`);
        })
        .catch(error => console.error('Error loading job details:', error));
}

function deleteJobEntry(jobId) {
    if (confirm("Are you sure you want to delete this job entry?")) {
        fetch(`delete_job.php?id=${jobId}`, {
            method: 'DELETE',
        })
        .then(response => response.json())
        .then(result => {
            if (result.success) {
                loadJobDetails();
            } else {
                alert('Failed to delete job entry. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error deleting job:', error);
            alert('Failed to delete job entry. Please try again.');
        });
    }
}

        function loadHeaderFooter() {
            fetch('header1.php')
                .then(response => response.text())
                .then(data => document.getElementById('header').innerHTML = data)
                .catch(error => console.error('Error loading header:', error));

            fetch('footer.html')
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
