<!-- <?php

require "connect.php";

// // Get the selected symptoms from the AJAX request
// // $selectedSymptoms = isset($_POST["symptom"]) ? $_POST["symptom"] : array();
// $selectedSymptoms = json_decode($_POST['selectedSymptoms']);
// echo $selectedSymptoms;

// // Generate the SQL query to retrieve diseases based on selected symptoms
// $query = "SELECT DISTINCT disease FROM symptoms";
// $conditions = array();

// if (isset($selectedSymptoms) && is_array($selectedSymptoms)) {
// foreach ($selectedSymptoms as $selectedSymptom) {
//     $conditions[] = "symptom_1 = '$selectedSymptom' OR symptom_2 = '$selectedSymptom' OR symptom_3 = '$selectedSymptom' OR symptom_4 = '$selectedSymptom' OR symptom_5 = '$selectedSymptom' OR symptom_6 = '$selectedSymptom' OR symptom_7 = '$selectedSymptom'";
//     echo $conditions;
// }
// }else {
//     echo "No loop to iterate";
// }

// $query .= implode(" AND ", $conditions);

// // Execute the query
// $result = $conn->query($query);

// // Process the result and generate the response
// if ($result && $result->num_rows > 0) {
//     $response = "<h2>Possible Diseases:</h2><ul>";
//     while ($row = $result->fetch_assoc()) {
//         $diseaseName = $row["disease"];
//         $response .= "<li>$diseaseName</li>";
//     }
//     $response .= "</ul>";
// } else {
//     $response = "<p>No diseases found for the selected symptoms.</p>";
// }

// // Send the response back to the AJAX request
// echo $response;


// // Get the selected symptoms from the form submission
// $selectedSymptoms = $_POST["symptom"];

// echo "Received Symptom Variable: ".$_POST["symptom"];
// echo "Selected Symptom Variable: ".$selectedSymptoms;

// // Generate the SQL query to retrieve diseases based on selected symptoms
// $query = "SELECT DISTINCT disease FROM symptoms";

// if (!empty($selectedSymptoms)) {
//     $conditions = array();
//     foreach ($selectedSymptoms as $selectedSymptom) {
//         $condition = "(symptom_1 = '$selectedSymptom' OR symptom_2 = '$selectedSymptom' OR symptom_3 = '$selectedSymptom' OR symptom_4 = '$selectedSymptom' OR symptom_5 = '$selectedSymptom' OR symptom_6 = '$selectedSymptom' OR symptom_7 = '$selectedSymptom')";
//         $conditions[] = $condition;

//         echo $condition;
//     }

//     $query .= " WHERE " . implode(" OR ", $conditions);
// }

// // Execute the query and process the result
// $result = $conn->query($query);

// // Process the result and generate the response
// if ($result && $result->num_rows > 0) {
//     $response = "<h2>Possible Diseases:</h2><ul>";
//     while ($row = $result->fetch_assoc()) {
//         $diseaseName = $row["disease"];
//         $response .= "<li>$diseaseName</li>";
//     }
//     $response .= "</ul>";
// } else {
//     $response = "<p>No diseases found for the selected symptoms.</p>";
// }

// // Send the response back
// echo $response; -->

// retrieve selected title from the user
if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
    $selected_symptoms = $_POST['symptom'];
    echo $selected_symptoms;

    // prepare the SQL query to fetch diseases based on selected symptoms
    $query = "SELECT DISTINCT disease FROM symptoms WHERE symptom_1 IN ('" . implode("','", $selected_symptoms) . "')";

    // execute query
    $result = $conn->query($query);

    // fetch results
    if ($result && $result->num_rows > 0) {
        $possible_diseases = [];
        while ($row = $result->fetch_assoc()) {
            $possible_diseases[] = $row['disease'];
        }
    }

    // display the possible diseases
    if (!empty($possible_diseases)) {
        echo "Possible diseases based on selected symptoms:<br>";
        foreach ($possible_diseases as $disease) {
            echo "- " . $disease . "<br>";
        }
    } else {
        echo "No diseases found for the selected symptoms.";
    }
} else {
    // query execution failed
    echo "Error executing query: " . $conn->error;
}
