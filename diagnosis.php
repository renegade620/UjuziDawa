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
    // Retrieve data from the diagnosis table
    $query = "SELECT symptoms FROM diagnosis";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($conn));
    }

    // Create an array to store the symptom counts
    $symptomCounts = [];

    // Loop through the diagnosis data and count the symptoms
    while ($row = mysqli_fetch_assoc($result)) {
        $symptoms = json_decode($row["symptoms"], true);
        foreach ($symptoms as $symptom) {
            if (!isset($symptomCounts[$symptom])) {
                $symptomCounts[$symptom] = 0;
            }
            $symptomCounts[$symptom]++;
        }
    }

    // Sort the symptom counts in descending order
    arsort($symptomCounts);

    // Display the most common symptoms
    echo "<h1>Most Common Symptoms</h1>";
    echo "<ul>";
    foreach ($symptomCounts as $symptom => $count) {
        echo "<li>" . htmlspecialchars($symptom) . ": " . htmlspecialchars($count) . "</li>";
    }
    echo "</ul>";

    // Retrieve data from the diagnosis table
    $query = "SELECT diseases FROM diagnosis";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($conn));
    }

    // Create an array to store the disease counts
    $diseaseCounts = [];

    // Loop through the diagnosis data and count the diseases
    while ($row = mysqli_fetch_assoc($result)) {
        $diseases = json_decode($row["diseases"], true);
        foreach ($diseases as $disease) {
            if (!isset($diseaseCounts[$disease])) {
                $diseaseCounts[$disease] = 0;
            }
            $diseaseCounts[$disease]++;
        }
    }

    // Sort the disease counts in descending order
    arsort($diseaseCounts);

    // Display the number of diagnoses by disease
    echo "<h1>Number of Diagnoses by Disease</h1>";
    echo "<ul>";
    foreach ($diseaseCounts as $disease => $count) {
        echo "<li>" . htmlspecialchars($disease) . ": " . htmlspecialchars($count) . "</li>";
    }
    echo "</ul>";

    $conn->close();
    ?>
</body>

</html>
