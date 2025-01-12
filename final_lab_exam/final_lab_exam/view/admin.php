<html lang="en">
<head>
    <title>Admin Panel</title>

</head>
<body>
    <h1>Admin Panel</h1>

    <h2>Register Employee</h2>
    <form action="../controller/reg_val.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="contact">Contact No:</label>
        <input type="text" id="contact" name="contact" required><br><br>

        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Register</button>
    </form>

    <h2>Search Employee</h2>
    <input type="text" id="search" placeholder="Search by Name">
    <div id="searchResults"></div>

    <h2>Employee Table</h2>
    <div id="employeeTable">
        <?php 
        require_once '../model/model.php';
        loadEmployeeTable(); 
        ?>  
    </div>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                let searchValue = $(this).val();
                $.ajax({
                    url: 'model.php',
                    method: 'POST',
                    data: { type: 'search', query: searchValue },
                    success: function(response) {
                        $('#searchResults').html(response);
                    }
                });
            });

            function loadTable() {
                $.ajax({
                    url: 'model.php',
                    method: 'POST',
                    data: { type: 'load_table' },
                    success: function(data) {
                        $('#employeeTable').html(data);
                    }
                });
            }

            loadTable();

            $('#registerForm').on('submit', function(event) {
                event.preventDefault();
                let name = $('#name').val();
                let contact = $('#contact').val();
                let username = $('#username').val();
                let password = $('#password').val();

                if (!name || !contact || !username || !password) {
                    alert("All fields are required!");
                    return;
                }

                $.ajax({
                    url: $(this).attr('action'),
                    method: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function(response) {
                        alert(response);
                        loadTable();
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + error);
                    }
                });
            });
        });
    </script>
</body>
</html>