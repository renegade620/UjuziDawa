<?php
require "connect.php";
// Create the disease_symptom table
$create_table_query = "CREATE TABLE disease_symptom (disease VARCHAR(255), symptom VARCHAR(255), weight INT, PRIMARY KEY (disease, symptom))";
$conn->query($create_table_query);

// Read data from symptoms and severity tables
$symptoms_query = "SELECT * FROM symptoms";
$symptoms_result = $conn->query($symptoms_query);

$severity_query = "SELECT * FROM severity";
$severity_result = $conn->query($severity_query);

// Build an associative array of symptom weights
$weights = [];
while ($row = $severity_result->fetch_assoc()) {
    $weights[$row['symptom']] = $row['weigh'];
}

// Insert data into disease_symptom table
$insert_query = "INSERT INTO disease_symptom (disease, symptom, weight) VALUES (?, ?, ?)";
$insert_stmt = $conn->prepare($insert_query);

while ($row = $symptoms_result->fetch_assoc()) {
    $disease = $row['disease'];
    for ($i = 1; $i <= 17; $i++) {
        $symptom_column = 'symptom_' . $i;
        if (!empty($row[$symptom_column])) {
            $symptom = $row[$symptom_column];
            if (isset($weights[$symptom])) {
                $weight = $weights[$symptom];
                $insert_stmt->bind_param('ssi', $disease, $symptom, $weight);
                $insert_stmt->execute();
            }
        }
    }
}
