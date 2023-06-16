<?php
// establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ujuzidawa";

$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Construct the symptom join conditions
$symptomJoins = "";
for ($i = 1; $i <= 17; $i++) {
    $symptomColumn = "symptom_" . $i;
    $symptomJoins .= "INNER JOIN severity AS severity$i ON symptoms.$symptomColumn = severity$i.symptom ";
}


// Calculate the overall score for each disease based on symptom weights
$query = "SELECT symptoms.disease, SUM(severity.weight) AS score
          FROM symptoms
          $symptomJoins
          GROUP BY symptoms.disease
          ORDER BY score DESC";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

// Retrieve the ranked diseases
while ($row = mysqli_fetch_assoc($result)) {
    $diseaseName = $row['disease'];
    $score = $row['score'];

    echo "Disease: $diseaseName, Score: $score <br>";
}