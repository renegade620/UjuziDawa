<!DOCTYPE html>
<html>

<head>
    <title>Diagnosis</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        h1 {
            color: #333;
        }

        table {
            margin-top: 20px;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
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
</head>

<body>
    <div class="back">
        <a href="admin.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    include "connect.php";

    // Retrieve data from the users and users_profile tables
    $query = "SELECT users.first_name, users.last_name, user_profile.symptoms, user_profile.diseases, user_profile.diagnosed_at
              FROM users
              JOIN user_profile ON users.user_id = user_profile.user_id";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($conn));
    }

    ?>

    <h1>Diagnosis</h1>

    <table>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Symptoms</th>
            <th>Diseases</th>
            <th>Diagnosed_at</th>
        </tr>
        <?php
        // Display the diagnosis details
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row["first_name"] . '</td>';
            echo '<td>' . $row["last_name"] . '</td>';
            echo '<td>' . $row["symptoms"] . '</td>';
            echo '<td>' . $row["diseases"] . '</td>';
            echo '<td>' . $row["diagnosed_at"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>

</html>