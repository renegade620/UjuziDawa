<!DOCTYPE html>
<html>

<head>

    <style>
        .more-info {
            display: none;
        }

        .more-info.hidden {
            display: table-row;
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
    </style>
</head>

<body>
    <div class="back">
    <a href="nurse.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    require "connect.php";

    $sql = "SELECT patient.health_number, patient.patient_name, TIMESTAMPDIFF(YEAR, patient.date_of_birth, CURDATE()) AS age, vitals.temperature, vitals.blood_pressure, vitals.heart_rate, vitals.respiratory_rate FROM patient INNER JOIN vitals ON patient.health_number = vitals.health_number";
    $result = $conn->query($sql);

    // Display the data in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Health Number</th><th>Name</th><th>Age</th><th>Temperature(°C)</th><th>Blood Pressure(mmHg)</th><th>Heart Rate(bpm)</th><th>Respiratory Rate(breaths/min)</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["health_number"] . "</td>";
            echo "<td>" . $row["patient_name"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["temperature"] . "</td>";
            echo "<td>" . $row["blood_pressure"] . "</td>";
            echo "<td>" . $row["heart_rate"] . "</td>";
            echo "<td>" . $row["respiratory_rate"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>

</html>