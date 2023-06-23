<!DOCTYPE html>
<html>
<head>
    <title>Demographics</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
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
    <div class="back">
        <a href="admin.php" class="back-button">Back to Dashboard</a>
    </div>
    </style>
</head>
<body>
    <?php
    include "connect.php"; // Include the database connection code

    // Retrieve the users' data including calculated age
    $query = "SELECT users.*, TIMESTAMPDIFF(YEAR, users.dob, CURDATE()) AS age FROM users";
    $result = mysqli_query($conn, $query);

    ?>

    <h1>Demographics</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Residence</th>
        </tr>
        <?php
        // Display the users' data with age in a table
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row["first_name"] . ' ' . $row["last_name"] . '</td>';
            echo '<td>' . $row["age"] . '</td>';
            echo '<td>' . $row["address"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>
</html>
