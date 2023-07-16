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
            margin: 0;
            padding: 0;
        }

        .dashboard {
            display: flex;
        }

        .sidebar {
            background-color: #f4f4f4;
            width: 200px;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #e4e4e4;
        }

        .main-content {
            flex-basis: 1;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .summary {
            display: flex;
        }

        .summary-card {
            background-color: #487cff;
            color: white;
            padding: 20px;
            margin-right: 20px;
        }

        .activities h2 {
            margin-top: 20px;
        }

        .activity-item {
            background-color: #f4f4f4;
            padding: 10px;
            margin-bottom: 10px;
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

        header h1 {
            color: white;
            font-size: xx-large;
        }

        .container {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        header {
            background-color: #487cff;
            color: white;
            padding: 20px 0;
        }

        header img {
            height: 50px;
        }

        #title {
            margin-left: 20px;
        }

        .sub-menu {
            display: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="container">
            <div class="logo">
                <img src="img\logo\ujuzi-dawa-logo-removebg-preview.png" alt="Logo">
            </div>
            <div id="title">
                <h1>Admin's Desk</h1>
            </div>
            <form action="logout.php">
                <button id="logout-btn" class="btn btn-rounded">Logout</button>
            </form>
        </div>
    </header>
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
            <h1>Hello Admin - <?php echo $_SESSION['username']; ?></h1>

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
                <div class="summary-card">
                    <h3>Total Departments</h3>
                    <p><?php echo getTotalDepartments(); ?></p>
                </div>
                <?php
                function getTotalDiagnoses()
                {
                    include "connect.php";
                    $query = "SELECT COUNT(*) AS total_diagnoses FROM diagnosis";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    return $row['total_diagnoses'];
                }

                function getTotalUsers()
                {
                    include "connect.php";
                    $query = "SELECT COUNT(*) AS total_users FROM users";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    return $row['total_users'];
                }

                function getTotalDiseases()
                {
                    include "connect.php";
                    $query = "SELECT COUNT(*) AS total_diseases FROM description";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    return $row['total_diseases'];
                }

                function getTotalDepartments()
                {
                    include "connect.php";
                    $query = "SELECT COUNT(*) AS total_departments FROM department";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    return $row['total_departments'];
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
        <div class="top-right">
            <div>
                <span style="color: white;">Logged in as: <?php echo $_SESSION['username']; ?></span>
            </div>
            <div>
                <button id="logout" onclick="logout()">Logout</button>
            </div>
            <script>
                function logout() {
                    window.location.href = "logout.php";
                }

                const menuItems = document.querySelectorAll('.sidebar > ul > li');

                menuItems.forEach(item => {
                    item.addEventListener('click', () => {
                        const subMenu = item.querySelector('.sub-menu');
                        if (subMenu) {
                            subMenu.style.display = subMenu.style.display === 'block' ? 'none' : 'block';
                        }
                    });
                });
            </script>
        </div>
    </div>
</body>

</html>