<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Users</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
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
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #487cff;
            color: white;
        }

        .no-users {
            text-align: center;
            margin-top: 20px;
        }

        .add-user-form {
            margin-top: 20px;
            display: none;
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

        .back {
            margin-top: 20px;
        }

        .back-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
    <script>
        function toggleUserForm() {
            var userForm = document.getElementById("user-form");
            userForm.style.display = (userForm.style.display === "none") ? "block" : "none";
        }
    </script>
</head>

<body>
    <div class="back">
        <a href="admin.php" class="back-button">Back to Dashboard</a>
    </div>
    <div class="dashboard">

        <div class="main-content">
            <h1>Users</h1>
            <?php
            require "connect.php";

            // Fetch users from the database
            $sql = "SELECT * FROM users";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<table>";
                echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Username</th><th>Date of Birth</th><th>Gender</th><th>Address</th><th>Phone Number</th><th>Role</th><th>Created At</th></tr>";

                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["user_id"] . "</td>";
                    echo "<td>" . $row["first_name"] . ' ' .  $row["last_name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["user_name"] . "</td>";
                    echo "<td>" . $row["dob"] . "</td>";
                    echo "<td>" . $row["gender"] . "</td>";
                    echo "<td>" . $row["address"] . "</td>";
                    echo "<td>" . $row["phone_number"] . "</td>";
                    echo "<td>" . $row["Role"] . "</td>";
                    echo "<td  colspan='10'>" . $row["created_at"] . "</td>";
                    echo '<td>';
                    echo '<form method="POST">';
                    echo '<input type="hidden" name="user_id" value="' . $row['user_id'] . '">';
                    echo '<button type="submit">Delete</button>';
                    echo '</form>';
                    echo '</td>';
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
                <form method="POST">
                    <input type="text" name="firstname" placeholder="First Name" required>
                    <input type="text" name="lastname" placeholder="Last Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                    <input type="date" name="dob" required><br><br>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br><br>
                    <input type="text" name="address" placeholder="Address" required>
                    <input type="tel" name="phone_num" placeholder="Phone Number" required><br><br>

                    <input type="radio" id="user" name="role" value="Doctor">
                    <label for="user">Doctor</label><br>
                    <input type="radio" id="admin" name="role" value="Admin">
                    <label for="admin">Admin</label><br>
                    <input type="radio" id="user" name="role" value="Nurse">
                    <label for="user">Nurse</label><br>
                    <input type="radio" id="admin" name="role" value="Receptionist">
                    <label for="admin">Receptionist</label><br><br>

                    <button type="submit">Add User</button>
                </form>
                <?php
                require "connect.php";

                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Retrieve form data
                    $firstname = $_POST['firstname'];
                    $lastname = $_POST['lastname'];
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $pwd = $_POST['password'];
                    $pwd_rpt = $_POST['confirm_password'];
                    $dob = $_POST['dob'];
                    $gender = $_POST['gender'];
                    $address = $_POST['address'];
                    $phone_num = $_POST['phone_num'];
                    $role = $_POST['role'];

                    // Validate and sanitize the input as per your requirements

                    // Prepare and execute the SQL query to insert the user into the database
                    $query = "INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number, role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("sssssssssss", $firstname, $lastname, $username, $email, $pwd, $pwd_rpt, $dob, $gender, $address, $phone_num, $role);
                    $stmt->execute();

                    // Check if the insertion was successful
                    if ($stmt->affected_rows > 0) {
                        echo "User added successfully!";
                    } else {
                        echo "Failed to add user.";
                    }

                    // Close the statement and database connection
                    $stmt->close();
                    $conn->close();
                }
                ?>
                <?php
                // Establish a database connection
                require "connect.php";

                // Check if the user ID is provided
                if (isset($_POST['user_id'])) {
                    $user_id = $_POST['user_id'];

                    // Prepare and execute the SQL query to delete the user from the database
                    $query = "DELETE FROM users WHERE user_id = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $user_id);
                    $stmt->execute();

                    // Check if the deletion was successful
                    if ($stmt->affected_rows > 0) {
                        echo "User deleted successfully!";
                    } else {
                        echo "Failed to delete user.";
                    }

                    // Close the statement and database connection
                    $stmt->close();
                }

                // Close the database connection
                $conn->close();
                ?>

            </div>
            <?php
            require "connect.php";

            // Retrieve data from the users table
            $query = "SELECT Role, COUNT(*) as user_count FROM users GROUP BY Role";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                die('Query Error: ' . mysqli_error($conn));
            }

            // Display the number of users by role
            echo "<h1>Number of Users by Role</h1>";
            echo "<ul>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<li>" . htmlspecialchars($row["Role"]) . ": " . htmlspecialchars($row["user_count"]) . "</li>";
            }
            echo "</ul>";

            $conn->close();
            ?>

        </div>
    </div>
</body>

</html>