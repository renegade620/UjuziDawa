<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard - Medical Diagnosis System</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .dashboard {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .sidebar {
            flex-basis: 200px;
            background-color: #f1f1f1;
            padding: 10px;
            margin-right: 20px;
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
            flex-basis: 80%;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .summary-card {
            flex-basis: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .activities {
            margin-bottom: 20px;
        }

        .activity-item {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .activity-item:last-child {
            margin-bottom: 0;
        }

        .top-right {
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-right select {
            width: 150px;
        }

        #logout {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <div class="sidebar">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="users.php">Users</a></li>
                <li><a href="diseases.php">Diseases</a></li>
                <li><a href="diagnosis.php">Diagnosis</a>
                <li><a href="demographics.php">Demographics</a>
            </ul>
        </div>

        <div class="main-content">
            <h1>Admin Dashboard</h1>

            <div class="summary">
                <div class="summary-card">
                    <h3>Total Diagnoses</h3>
                    <p><?php echo getTotalDiagnoses(); ?></p>
                </div>
                <div class="summary-card">
                    <h3>Total Users</h3>
                    <p><?php echo getTotalUsers(); ?></p>
                </div>
                <div class="summary-card">
                    <h3>Total Diseases</h3>
                    <p><?php echo getTotalDiseases(); ?></p>
                </div>
                <?php
function getTotalDiagnoses() {
    include "connect.php";
    $query = "SELECT COUNT(*) AS total_diagnoses FROM user_profile";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_diagnoses'];
}

function getTotalUsers() {
    include "connect.php";
    $query = "SELECT COUNT(*) AS total_users FROM users";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_users'];
}

function getTotalDiseases() {
    include "connect.php";
    $query = "SELECT COUNT(*) AS total_diseases FROM description";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    return $row['total_diseases'];
}
?>
            </div>

            <div class="activities">
                <h2>Recent Activities</h2>
                <div class="activity-item">
                    <p>Farida Swaleh diagnosis added</p>
                    <p>Date: 2023-06-15</p>
                </div>
                <div class="activity-item">
                    <p>Ruth Jeptoo's diagnosis updated</p>
                    <p>Date: 2023-06-14</p>
                </div>
                <div class="activity-item">
                    <p>New user registration: Francis Mtalaki</p>
                    <p>Date: 2023-06-13</p>
                </div>
            </div>
        </div>
        <!-- Display the current user logged in -->
        <div class="top-right">
            <div>
                <span>Logged in as: <?php echo $_SESSION['username']; ?></span>
            </div>
            <div>
                <button id="logout" onclick="logout()">Logout</button>
            </div>
            <script>
                function logout() {
                    window.location.href = "logout.php";
                }
            </script>
        </div>
    </div>
</body>

</html>