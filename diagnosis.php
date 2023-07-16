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
</head>

<body>
    <div class="back">
        <a href="admin.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    include "connect.php";

    // Retrieve data from the users and users_profile tables
    $query = "SELECT patient.patient_name, diagnosis.symptoms, diagnosis.diseases, diagnosis.diagnosed_at, diagnosis.diagnosed_by
              FROM patient
              JOIN diagnosis ON patient.health_number = diagnosis.health_number ";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($conn));
    }

    ?>

    <h1>Diagnosis</h1>

    <table>
        <tr>
            <th>Name</th>
            <th>Symptoms</th>
            <th>Diseases</th>
            <th>Diagnosed_at</th>
            <th>Diagnosed_by</th>
        </tr>
        <?php
        // Display the diagnosis details
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row["patient_name"] . '</td>';
            $symptoms = json_decode($row["symptoms"], true);
            echo "<td>" . implode(", ", $symptoms) . "</td>";
            $diseases = json_decode($row["diseases"], true);
            echo "<td>" . implode(", ", $diseases) . "</td>";
            echo '<td>' . $row["diagnosed_at"] . '</td>';
            echo '<td>' . 'Dr.' .$row["diagnosed_by"] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>

    <?php
    $conn->close();
    ?>
</body>

</html>