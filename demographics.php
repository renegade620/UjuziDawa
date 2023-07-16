<!DOCTYPE html>
<html>

<head>
    <title>Demographics</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        h1 {
            color: #333;
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
    include "connect.php";

    $query = "SELECT patient.*, TIMESTAMPDIFF(YEAR, patient.date_of_birth, CURDATE()) AS age, TIMESTAMPDIFF(MONTH, patient.date_of_birth, CURDATE()) % 12 AS months FROM patient";
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
            echo '<td>' . $row["patient_name"] . '</td>';
            echo '<td>' . $row["age"] . 'yr(s) ' .  $row["months"] . 'month(s)' . '</td>';
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