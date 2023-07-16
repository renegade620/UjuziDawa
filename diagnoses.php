<?php
session_start();
$doctorName = $_SESSION['username']

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <title>UjuziDawa || Medical Diagnosis System</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .dashboard {
            display: flex;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .sidebar {
            flex-basis: 200px;
            background-color: #f1f1f1;
            padding: 10px;
            margin-right: 20px;
        }

        .sidebar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .sidebar li {
            margin-bottom: 10px;
        }

        .sidebar li a {
            display: block;
            padding: 10px;
            background-color: #ddd;
            color: #333;
            text-decoration: none;
            border-radius: 5px;
        }

        .sidebar li a:hover {
            background-color: #ccc;
        }

        .main-content {
            flex-basis: 80%;
            padding: 10px;
        }

        h1 {
            text-align: center;
        }

        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .summary-card {
            flex-basis: 30%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .activities {
            margin-bottom: 20px;
        }

        .activity-item {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .activity-item:last-child {
            margin-bottom: 0;
        }

        .top-right {
            position: absolute;
            top: 10px;
            right: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .top-right select {
            width: 150px;
        }

        #logout {
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
        <a href="doctor.php" class="back-button">Back to Dashboard</a>
    </div>
    <div>

        <div>
            <?php

            require "connect.php";

            $symptoms_json = "";
            $diseases_json = "";

            if (isset($_POST['form-submitted'])) {
                if (isset($_POST['health-number'])) {
                    $health_number = $_POST['health-number'];

                    $patient_query = "SELECT * FROM patient INNER JOIN vitals ON patient.health_number = vitals.health_number WHERE patient.health_number = '$health_number'";
                    $patient_result = $conn->query($patient_query);


                    if ($patient_result && $patient_result->num_rows > 0) {
                        $patient_row = $patient_result->fetch_assoc();
                        $health_number = $patient_row['health_number'];
                        $patient_name = $patient_row['patient_name'];

                        echo "Health Number: " . $health_number . "<br>";
                        echo "Patient Name: " . $patient_name . "<br>";

                        $_SESSION['health_number'] = $health_number;
                        echo $health_number;
                    }
                }
                if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
                    $selected_symptoms = $_POST['symptom'];

                    // Calculate the threshold based on the number of selected symptoms and their weights
                    $threshold_query = "SELECT SUM(weight) as threshold FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "')";
                    $threshold_result = $conn->query($threshold_query);
                    $threshold_row = $threshold_result->fetch_assoc();
                    $threshold = $threshold_row['threshold'] * 0.05; // Only display diseases with a total score above 50% of the maximum possible score

                    $query = "SELECT disease, SUM(weight) as total_score FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "') GROUP BY disease ORDER BY total_score DESC";
                    $result = $conn->query($query);

                    $symptoms_json = json_encode($selected_symptoms);
                    echo $symptoms_json;

                    if ($result && $result->num_rows > 0) {
                        // Find the maximum score
                        $max_score = 0;
                        while ($row = $result->fetch_assoc()) {
                            if ($row['total_score'] > $max_score) {
                                $max_score = $row['total_score'];
                            }
                        }

                        // Reset result pointer
                        $result->data_seek(0);

                        // Display diseases with scores and progress bars
                        $diseases = "Possible diseases based on selected symptoms: <br>";
                        $counter = 0;
                        $diseases_array = array();
                        while (($row = $result->fetch_assoc()) && $counter < 5) {
                            if ($row['total_score'] > $threshold) {
                                // Only display diseases with a total score above the threshold
                                $disease = $row['disease'];
                                $total_score = $row['total_score'];
                                $percentage = ($total_score / $max_score) * 100;
                                $diseases .= "<a href='disease_info.php?disease=$disease' target='_blank'>$disease</a> (score: " . $total_score . ")<br>";
                                $diseases .= "<progress value='$percentage' max='100' style='color:green'></progress><br>";

                                array_push($diseases_array, $disease);
                                $counter++;
                            }
                        }
                        $diseases_json = json_encode($diseases_array);
                    } else {
                        // no diseases found for selected symptoms
                        $diseases = "No diseases found for selected symptoms.";
                    }
                } else {
                    // no symptoms selected by user
                    $diseases = "Please select at least one symptom.";
                }
                $healthNumber = $_SESSION['health_number'];
                $doctorName = $_SESSION['username'];

                $x = "INSERT INTO diagnosis(health_number, symptoms, diseases, diagnosed_at, diagnosed_by) VALUES ('$healthNumber', '$symptoms_json', '$diseases_json', NOW(), '$doctorName')";
                echo $x;
                $conn->query($x);
                echo '<div id="diagnosis-results">';
                echo   'Symptoms: ' . $symptoms_json . '<br>';
                echo 'Diseases: ' . $diseases_json . '<br>';
                echo '</div>';
            }
            $conn->close();
            ?>

        </div>
        <form method="POST">
            <input type="hidden" name="form-submitted" value="1">
            <h1>Diagnosis</h1>
            <h2>Health Number<br><br></h2>
            <label for="health-number">Health Number:</label>
            <input type="text" id="health-number" name="health-number" required><br><br>

            <h2>Select symptoms<br><br></h2>
            <label for="symptom">Symptom 1:</label>
            <select id="symptoms-1" name="symptom[]" multiple>
                <option value="itching">itching</option>
                <option value="skin rash">skin rash</option>
                <option value="continuous sneezing">continuous sneezing</option>
                <option value="stomach pain">stomach pain</option>
                <option value="acidity">acidity</option>
                <option value="shivering">shivering</option>
                <option value="vomiting">vomiting</option>
                <option value="muscle wasting">muscle wasting</option>
                <option value="patches in throat">patches in throat</option>
                <option value="fatigue">fatigue</option>
                <option value="weight loss">weight loss</option>
                <option value="indigestion">indigestion</option>
                <option value="sunken eyes">sunken eyes</option>
                <option value="headache">headache</option>
                <option value="cough">cough</option>
                <option value="chest pain">chest pain</option>
                <option value="weakness in limbs">weakness in limbs</option>
                <option value="back pain">back pain</option>
                <option value="chills">chills</option>
                <option value="joint pain">joint pain</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="constipation">constipation</option>
                <option value="pain during bowel movements">pain during bowel movements</option>
                <option value="breathlessness">breathlessness</option>
                <option value="cramps">cramps</option>
                <option value="mood swings">mood swings</option>
                <option value="stiff neck">stiff neck</option>
                <option value="muscle weakness">muscle weakness</option>
                <option value="pus filled pimples">pus filled pimples</option>
                <option value="burning mictrution">burning mictrution</option>
                <option value="bladder discomfort">bladder discomfort</option>
                <option value="high fever">high fever</option>

            </select>

            <label for="symptom">Symptom 2:</label>
            <select id="symptoms-2" name="symptom[]" multiple>
                <option value="nodal skin eruptions">nodal skin eruptions</option>
                <option value="skin rash">skin rash</option>
                <option value="shivering">shivering</option>
                <option value="chills">chills</option>
                <option value="acidity">acidity</option>
                <option value="ulcers on tongue">ulcers on tongue</option>
                <option value="vomiting">vomiting</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="stomach pain">stomach pain</option>
                <option value="loss of appetite">loss of appetite</option>
                <option value="indigestion">indigestion</option>
                <option value="patches in throat">patches in throat</option>
                <option value="high fever">high fever</option>
                <option value="weight loss">weight loss</option>
                <option value="restlessness">restlessness</option>
                <option value="sunken eyes">sunken eyes</option>
                <option value="dehydration">dehydration</option>
                <option value="cough">cough</option>
                <option value="chest pain">chest pain</option>
                <option value="dizziness">dizziness</option>
                <option value="headache">headache</option>
                <option value="weakness in limbs">weakness in limbs</option>
                <option value="neck pain">joint pain</option>
                <option value="weakness of one body side">weakness of one body size</option>
                <option value="fatigue">fatigue</option>
                <option value="joint pain">joint pain</option>
                <option value="lethargy">lethargy</option>
                <option value="nausea">nausea</option>
                <option value="abdominal pain">abdominal pain</option>
                <option value="pain during bowel movements">pain during bowel movements</option>
                <option value="pain in anal region">pain in anal region</option>
                <option value="sweating">sweating</option>
                <option value="breathlessness">breathlessness</option>
                <option value="cramps">cramps</option>
                <option value="bruising">bruising</option>
                <option value="weight gain">weight gain</option>
                <option value="cold hands and feets">cold hands and feets</option>
                <option value="anxiety">anxiety</option>
                <option value="knee pain">knee pain</option>
                <option value="stiff neck">stiff neck</option>
                <option value="swelling joints">swelling joints</option>
                <option value="pus filled pimples">pus filled pimples</option>
                <option value="blackheads">blackheads</option>
                <option value="bladder discomfort">bladder discomfort</option>
                <option value="skin peeling">skin peeling</option>
                <option value="foul smell of urine">foul smell of urine</option>
                <option value="blister">blister</option>
            </select>

            <label for="symptom">Symptom 3:</label>
            <select id="symptoms-3" name="symptom[]" multiple>
                <option value="nodal skin eruptions">nodal skin eruptions</option>
                <option value="dischromic patches">dischromic patches</option>
                <option value="chills">chills</option>
                <option value="watering from eyes">shivering</option>
                <option value="ulcers on tongue">ulcers on tongue</option>
                <option value="vomiting">vomiting</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="nausea">nausea</option>
                <option value="stomach pain">stomach pain</option>
                <option value="burning micturition">burning micturition</option>
                <option value="abdominal pain">abdominal pain</option>
                <option value="loss of appetite">loss of appetite</option>
                <option value="high fever">high fever</option>
                <option value="extra marital contacts">extra marital contacts</option>
                <option value="restlessness">restlessness</option>
                <option value="lethargy">lethargy</option>
                <option value="dehydration">dehydration</option>
                <option value="diarrhoea">diarrhoea</option>
                <option value="breathlessness">breathlessness</option>
                <option value="dizziness">dizziness</option>
                <option value="loss of balance">loss of balance</option>
                <option value="headache">headache</option>
                <option value="blurred and distorted vision">blurred and distorted vision</option>
                <option value="neck pain">joint pain</option>
                <option value="weakness of one body side">weakness of one body size</option>
                <option value="altered sensorium">altered sensorium</option>
                <option value="fatigue">fatigue</option>
                <option value="weight loss">weight loss</option>
                <option value="sweating">sweating</option>
                <option value="joint pain">joint pain</option>
                <option value="dark urine">dark urine</option>
                <option value="swelling of stomach">swelling of stomach</option>
                <option value="cough">cough</option>
                <option value="pain in anal region">pain in anal region</option>
                <option value="bloody stool">bloody stool</option>
                <option value="chest pain">chest pain</option>
                <option value="bruising">bruising</option>
                <option value="cold hands and feets">cold hands and feets</option>
                <option value="obesity">obesity</option>
                <option value="mood swings">mood swings</option>
                <option value="anxiety">anxiety</option>
                <option value="knee pain">knee pain</option>
                <option value="hip joint pain">hip joint pen</option>
                <option value="swelling joints">swelling joints</option>
                <option value="movement stiffness">movement stiffness</option>
                <option value="spinning movements">spinning movements</option>
                <option value="blackheads">blackheads</option>
                <option value="scurring">scurring</option>
                <option value="foul smell of urine">foul smell of urine</option>
                <option value="continuous feel of urine">continuous feel of urine</option>
                <option value="skin peeling">skin peeling</option>
                <option value="silver like dusting">silver like dusting</option>
                <option value="blister">blister</option>
                <option value="red sore around nose">red sore around nose</option>

            </select>


            <input id="check" type="submit" value="Diagnose">
            <input id="reset" type="reset" value="Reset">

            <div id="diagnosis-results">
                <?php echo $diseases; ?>
            </div>

        </form>
    </div>
</body>

</html>