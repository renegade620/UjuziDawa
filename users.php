<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Users</title>
    <style>
        /* CSS styles for the users page */
        /* CSS styles for the users page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
        }

        .dashboard {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f1f1f1;
            border-radius: 5px;
        }

         .sidebar {
            flex-basis: 200px;
            padding: 10px;
        }
        
        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        
        .sidebar li {
            margin-bottom: 10px;
        }
        
        .sidebar li a {
            display: block;
            padding: 10px;
            background-color: #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }
        
        .sidebar li a:hover {
            background-color: #ccc;
        }
        
        .main-content {
            flex-basis: calc(100% - 200px);
            padding: 10px;
        }
        

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f5f5f5;
        }

        .no-users {
            text-align: center;
            margin-top: 20px;
        }

        .add-user-form {
            margin-top: 20px;
        }
        
        .add-user-form input[type="text"],
        .add-user-form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        
        .add-user-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .add-user-form button:hover {
            background-color: #45a049;
        }

        /* Add your custom styles here */
    </style>
     <script>
        // JavaScript to toggle the visibility of the user form
        function toggleUserForm() {
            var userForm = document.getElementById("user-form");
            userForm.style.display = (userForm.style.display === "none") ? "block" : "none";
        }
    </script>
</head>

<body>
    <div class="dashboard">
        

        <div class="main-content">
            <h1>Users</h1>

            <?php
            // Establish a database connection
            require "connect.php";

            // Fetch users from the database
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . ' ' .  $row["last_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "No users found.";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>
                        <button onclick="toggleUserForm()">Add User</button>

             <div class="add-user-form" id="user-form">
                <h2>Add User</h2>
                <form action="create_user.php" method="POST">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <button type="submit">Add User</button>
                </form>
            </div>
        </div>
        <div class="sidebar">
            <ul>
                <li><a href="try.php">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="#">Diseases</a></li>
            </ul>
        </div>
    </div>
</body>

</html>