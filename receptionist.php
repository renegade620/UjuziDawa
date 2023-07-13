<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="./css/home.css" /> -->
    <title>UjuziDawa || Medical Diagnosis System</title>
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

        body {
            font-size: 1rem;
            font-weight: normal;
            color: #60698d;
            line-height: 1.5;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            overflow: auto;

        }

        header h1 {
            color: white;
            font-size: xx-large;
        }

        .tiles-container {
            display: flex;
            flex-wrap: wrap;
        }

        .tile {
            width: 300px;
            height: 150px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
        }

        header {
            height: 120px;
            top: 0;
            right: 0;
            width: 100%;
            background-color: #487cff;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            margin-top: 20px;
            opacity: 1;
        }

        #title {
            text-align: center;
            align-content: center;
        }

        .patient-registration,
        .patient-list {
            margin-bottom: 30px;
        }

        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #487cff;
            border-radius: 5px;
        }

        h2,
        h3 {
            color: #333;
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 14px;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        input[type="submit"],
        input[type="reset"],
        #book-appointment-btn {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #45a049;
        }

        #parent-info {
            display: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #e6e6e6;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
        }

        .card {
            width: 300px;
            margin: 10px;
            border: 1px solid #ccc;
            box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #f4f4f4;
            padding: 10px;
        }

        .card-header h3 {
            margin: 0;
        }

        .card-body {
            padding: 10px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
                <h1>Receptionist Desk</h1>
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
                <li><a href="reg.php">Patient Registration</a></li>
                <li><a href="cardvalid.php">Validate Health Card</a>
                <li><a href="get-patient-report.php">Patient List</a></li>
            </ul>
        </div>

        <div class="main-content">
            <div class="summary">
                <div class="summary-card">
                    <h3>Total Registered Patients</h3>
                    <p><?php echo getTotalPatients(); ?></p>
                </div>
                <?php
                function getTotalPatients()
                {
                    include "connect.php";
                    $query = "SELECT COUNT(*) AS total_patients FROM patient";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    return $row['total_patients'];
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