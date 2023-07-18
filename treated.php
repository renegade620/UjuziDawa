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
    <a href="doctor.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    require "connect.php";

    $sql = "SELECT patient.health_number, patient.patient_name, treatments.disease_treated, treatments.prescription, treatments.by_doctor FROM patient INNER JOIN treatments ON patient.health_number = treatments.health_number";
    $result = $conn->query($sql);

    // Display the data in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Health Number</th><th>Name</th><th>Disease Treated</th><th>Prescription</th><th>By Doctor</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["health_number"] . "</td>";
            echo "<td>" . $row["patient_name"] . "</td>";
            echo "<td>" . $row["disease_treated"] . "</td>";
            echo "<td>" . $row["prescription"] . "</td>";
            echo "<td>" . $row["by_doctor"] . "</td>";
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