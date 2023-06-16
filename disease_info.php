<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #6BA5D7;
        }
    </style>
</head>

<body>
    <?php
    include "connect.php";

    // Get the disease name from the URL query parameter
    $disease = $_GET["disease"];

    // Query the database to retrieve data about the disease
    $description_query = "SELECT * FROM description WHERE disease='$disease'";
    $description_result = mysqli_query($conn, $description_query);
    $description_row = mysqli_fetch_assoc($description_result);

    $symptoms_query = "SELECT * FROM symptoms WHERE disease='$disease'";
    $symptoms_result = mysqli_query($conn, $symptoms_query);
    $symptoms_row = mysqli_fetch_assoc($symptoms_result);

    $remedy_query = "SELECT * FROM precaution_remedy WHERE disease='$disease'";
    $remedy_result = mysqli_query($conn, $remedy_query);
    $remedy_row = mysqli_fetch_assoc($remedy_result);

    // Display data about the disease
    echo "<h1>$disease</h1>";
    echo "<h2>Description</h2>";
    echo "<p>" . $description_row["definition"] . "</p>";
    echo "<h2>Other Symptoms</h2>";
    echo "<ul>";
    for ($i = 1; $i <= 17; $i++) {
        $symptom_key = "symptom_" . $i;
        if (!empty($symptoms_row[$symptom_key])) {
            echo "<li>" . $symptoms_row[$symptom_key] . "</li>";
        } else {
            break;
        }
    }
    echo "<h2>Precautions and Remedies</h2>";
    echo "<ul>";
    for ($i = 1; $i <= 4; $i++) {
        $remedy_key = "remedy_" . $i;
        if (!empty($remedy_row[$remedy_key])) {
            echo "<li>" . $remedy_row[$remedy_key] . "</li>";
        } else {
            break;
        }
    }
    echo "</ul>";
    $conn->close();
    ?>

</body>

</html>