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
</head>

<body>
    <div class="back">
        <a href="admin.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    include "connect.php";

    // Query to get patient data
    $query = "SELECT patient.*, TIMESTAMPDIFF(YEAR, patient.date_of_birth, CURDATE()) AS age, TIMESTAMPDIFF(MONTH, patient.date_of_birth, CURDATE()) % 12 AS months FROM patient";
    $result = mysqli_query($conn, $query);

    // Query to calculate average age
    $avgAgeQuery = "SELECT AVG(TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE())) as average_age FROM patient";
    $avgAgeResult = mysqli_query($conn, $avgAgeQuery);
    $avgAgeRow = mysqli_fetch_assoc($avgAgeResult);
    $averageAge = round($avgAgeRow['average_age'], 1);

    // Query to count patients by age bracket
    $ageBracketsQuery = "SELECT
      SUM(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) < 18 THEN 1 ELSE 0 END) as under_18,
      SUM(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN 18 AND 30 THEN 1 ELSE 0 END) as between_18_and_30,
      SUM(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN 31 AND 45 THEN 1 ELSE 0 END) as between_31_and_45,
      SUM(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) BETWEEN 46 AND 60 THEN 1 ELSE 0 END) as between_46_and_60,
      SUM(CASE WHEN TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) > 60 THEN 1 ELSE 0 END) as over_60
    FROM patient";
    $ageBracketsResult = mysqli_query($conn, $ageBracketsQuery);
    $ageBracketsRow = mysqli_fetch_assoc($ageBracketsResult);

    // Query to count patients by address
    $addressesQuery = "SELECT address, COUNT(*) as count FROM patient GROUP BY address ORDER BY count DESC";
    $addressesResult = mysqli_query($conn, $addressesQuery);
    ?>

    <h1>Demographics</h1>

    <p>Average age of patients: <?php echo $averageAge; ?> years</p>

    <h2>Patients by Age Bracket</h2>
    <ul>
        <li>Under 18: <?php echo $ageBracketsRow['under_18']; ?></li>
        <li>Between 18 and 30: <?php echo $ageBracketsRow['between_18_and_30']; ?></li>
        <li>Between 31 and 45: <?php echo $ageBracketsRow['between_31_and_45']; ?></li>
        <li>Between 46 and 60: <?php echo $ageBracketsRow['between_46_and_60']; ?></li>
        <li>Over 60: <?php echo $ageBracketsRow['over_60']; ?></li>
    </ul>

    <h2>Patients by Address</h2>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($addressesResult)) : ?>
            <li><?php echo htmlspecialchars($row['address']); ?>:
                <?php echo htmlspecialchars($row['count']); ?></li>
        <?php endwhile; ?>
    </ul>

    <h2>Patients</h2>
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