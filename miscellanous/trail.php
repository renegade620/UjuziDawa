<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css\home.css" />
    <title>UjuziDawa || Medical Diagnosis System</title>

</head>

<body>
    <div class="loader-overlay">
        <div class="spinner"></div>
    </div>

    <header class="header flex">
        <div class="container flex">
            <div class="logo">
                <img src="img\logo\ujuzi-dawa-logo-removebg-preview.png" alt="" class="logo-img" />
                <marquee id="runn" style="height: auto; width:650px;  color: #FFFFFF;" loop="infinite" direction="left" scrollamount="5">
                    <p class="text-center text-success"><span id="stdmsg" class="label label-danger" style="font-size: 18px">
                            <span id="stdmsg" class="labell label-danger" style="font-size: 18px">
                                <?php echo "Welcome " . $_SESSION['username'] . ". You are going to feel well soon!" ?>
                            </span>
                    </p>
                </marquee>



            </div>

            <?php
            //     include "connect.php";

            //     // Get the search query from the user input
            //     $search_query = $_GET["search_query"];

            //     // Query the database to find diseases that match the search query
            //     $diseases_query = "SELECT * FROM symptoms WHERE disease LIKE '%$search_query%'";
            //     $diseases_result = mysqli_query($conn, $diseases_query);

            //     // Display links to the disease_info.php page for each matching disease
            //     // Check for errors
            //     if (!$diseases_result) {
            //         // Display an error message
            //         echo "Error: " . mysqli_error($conn);
            //     } else {
            //         // Process the query results
            //     while ($disease_row = mysqli_fetch_assoc($diseases_result)) {
            //         $disease_name = $disease_row["disease"];
            //         echo "<a href='disease_info.php?disease=$disease_name'>$disease_name</a><br>";
            //     }
            // }


            // $conn->close();
            ?>
            <form method="get" action="disease_info.php?disease=$disease">
                <div class="search">
                    <input type="text" name="search_query" placeholder="Search Diseases..." />
                    <button type="submit">&#x1F50D;</button>
                </div>
            </form>


        </div>
    </header>

    <section class="banner" id="home">
        <div class="container flex">
            <div class="banner-text">
                <h1 class="banner-heading">A Medical Diagnosis System</h1>
                <p class="lead">
                    Using the application will make you feel like you are with your doctor
                </p>
                <form action="logout.php">
                    <button id="logout-btn" class="btn btn-rounded">GoodBye</button>
                </form>

            </div>
            <div class="banner-img">
                <img src="img\hero\medcare.jpg" alt="Banner" />
            </div>
        </div>
    </section>
    <main>
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

        // if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
        //     $selected_symptoms = $_POST['symptom'];

        //     $query = "SELECT disease, SUM(weight) as total_score FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "') GROUP BY disease ORDER BY total_score DESC";
        //     $result = $conn->query($query);

        //     if ($result && $result->num_rows > 0) {
        //         // Find the maximum score
        //         $max_score = 0;
        //         while ($row = $result->fetch_assoc()) {
        //             if ($row['total_score'] > $max_score) {
        //                 $max_score = $row['total_score'];
        //             }
        //         }

        //         // Reset result pointer
        //         $result->data_seek(0);

        //         // Display diseases with scores and progress bars
        //         $diseases = "Possible diseases based on selected symptoms: <br>";
        //         while ($row = $result->fetch_assoc()) {
        //             $disease = $row['disease'];
        //             $total_score = $row['total_score'];
        //             $percentage = ($total_score / $max_score) * 100;
        //             $diseases .= "<a href='disease_info.php?disease=$disease' target='_blank'>$disease</a> (score: " . $total_score . ")<br>";
        //             $diseases .= "<progress value='$percentage' max='100' style='color:green'></progress><br>";
        //         }
        //     } else {
        //         // no diseases found for selected symptoms
        //         $diseases = "No diseases found for selected symptoms.";
        //     }
        // } else {
        //     // no symptoms selected by user
        //     $diseases = "Please select at least one symptom.";
        // }


        // if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
        //     $selected_symptoms = $_POST['symptom'];

        //     // Calculate the threshold based on the number of selected symptoms and their weights
        //     $threshold_query = "SELECT SUM(weight) as threshold FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "')";
        //     echo $threshold_query;
        //     $threshold_result = $conn->query($threshold_query);
        //     $threshold_row = $threshold_result->fetch_assoc();
        //     $threshold = $threshold_row['threshold'] * 0.5; // Only display diseases with a total score above 50% of the maximum possible score

        //     $query = "SELECT disease, SUM(weight) as total_score FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "') GROUP BY disease HAVING total_score > $threshold ORDER BY total_score DESC";
        //     $result = $conn->query($query);

        //     if ($result && $result->num_rows > 0) {
        //         // Find the maximum score
        //         $max_score = 0;
        //         while ($row = $result->fetch_assoc()) {
        //             if ($row['total_score'] > $max_score) {
        //                 $max_score = $row['total_score'];
        //             }
        //         }

        //         // Reset result pointer
        //         $result->data_seek(0);

        //         // Display diseases with scores and progress bars
        //         $diseases = "Possible diseases based on selected symptoms: <br>";
        //         while ($row = $result->fetch_assoc()) {
        //             $disease = $row['disease'];
        //             $total_score = $row['total_score'];
        //             $percentage = ($total_score / $max_score) * 100;
        //             $diseases .= "<a href='disease_info.php?disease=$disease' target='_blank'>$disease</a> (score: " . $total_score . ")<br>";
        //             $diseases .= "<progress value='$percentage' max='100' style='color:green'></progress><br>";
        //         }
        //     } else {
        //         // no diseases found for selected symptoms
        //         $diseases = "No diseases found for selected symptoms.";
        //     }
        // } else {
        //     // no symptoms selected by user
        //     $diseases = "Please select at least one symptom.";
        // }

        if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
            $selected_symptoms = $_POST['symptom'];

            // Calculate the threshold based on the number of selected symptoms and their weights
            $threshold_query = "SELECT SUM(weight) as threshold FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "')";
            echo $threshold_query;
            echo "<br><br>";
            $threshold_result = $conn->query($threshold_query);
            $threshold_row = $threshold_result->fetch_assoc();
            $threshold = $threshold_row['threshold'] * 0.05; // Only display diseases with a total score above 50% of the maximum possible score
            echo "Threshold: " . $threshold;
            echo "<br><br>";

            $query = "SELECT disease, SUM(weight) as total_score FROM disease_symptom WHERE symptom IN ('" . implode("','", $selected_symptoms) . "') GROUP BY disease ORDER BY total_score DESC";
            echo $query;
            $result = $conn->query($query);
            echo "Result: ";
            var_dump($result);
            echo "<br><br>";

            if ($result && $result->num_rows > 0) {
                // Find the maximum score
                $max_score = 0;
                while ($row = $result->fetch_assoc()) {
                    echo "Processing disease: " . $row['disease'];
                    echo "<br><br>";
                    if ($row['total_score'] > $max_score) {
                        $max_score = $row['total_score'];
                    }
                }

                // Reset result pointer
                $result->data_seek(0);

                // Display diseases with scores and progress bars
                $diseases = "Possible diseases based on selected symptoms: <br>";
                $counter = 0;
                while (($row = $result->fetch_assoc()) && $counter < 5) {
                    if ($row['total_score'] > $threshold) {
                        // Only display diseases with a total score above the threshold
                        $disease = $row['disease'];
                        $total_score = $row['total_score'];
                        $percentage = ($total_score / $max_score) * 100;
                        $diseases .= "<a href='disease_info.php?disease=$disease' target='_blank'>$disease</a> (score: " . $total_score . ")<br>";
                        $diseases .= "<progress value='$percentage' max='100' style='color:green'></progress><br>";

                        $counter++; 
                    }
                }
            } else {
                // no diseases found for selected symptoms
                $diseases = "No diseases found for selected symptoms.";
            }
        } else {
            // no symptoms selected by user
            $diseases = "Please select at least one symptom.";
        }





        $conn->close();
        ?>


        <form method="POST">
            <h1>Select symptoms<br>
                <br>
            </h1>
            <label for="symptom-1">Symptom 1:</label>
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

            <label for="symptom-2">Symptom 2:</label>
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

            <label for="symptom-3">Symptom 3:</label>
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

            <label for="symptom-4">Symptom 4:</label>
            <select id="symptoms-4" name="symptom[]" multiple>
                <option value="dischromic patches">dischromic patches</option>
                <option value="watering from eyes">shivering</option>
                <option value="vomiting">vomiting</option>
                <option value="cough">cough</option>
                <option value="nausea">nausea</option>
                <option value="loss of appetite">loss of appetite</option>
                <option value="spotting urination">spotting urination</option>
                <option value="burning micturition">burning micturition</option>
                <option value="passage of gases">passage of gases</option>
                <option value="abdominal pain">abdominal pain</option>
                <option value="extra marital contacts">extra marital contacts</option>
                <option value="lethargy">lethargy</option>
                <option value="irregular sugar level">irregular sugar level</option>
                <option value="diarrhoea">diarrhoea</option>
                <option value="breathlessness">breathlessness</option>
                <option value="family history">family history</option>
                <option value="loss of balance">loss of balance</option>
                <option value="lack of concentration">lack of concentration</option>
                <option value=" blurred and distorted vision"> blurred and distorted vision</option>
                <option value="dizziness">dizziness</option>
                <option value="altered sensorium">altered sensorium</option>
                <option value="excessive hunger">excessive hunger</option>
                <option value="weight loss">weight loss</option>
                <option value="high fever">high fever</option>
                <option value="headache">headache</option>
                <option value="sweating">sweating</option>
                <option value="fatigue">fatigue</option>
                <option value="dark urine">dark urine</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="yellowing of eyes">yellowing of eyes</option>
                <option value="swelling of stomach">swelling of stomach</option>
                <option value="distention of abdomen">distention of abdomen</option>
                <option value="bloody stool">bloody stool</option>
                <option value="irritation in anus">irritation in anus</option>
                <option value="chest pain">chest pain</option>
                <option value="obesity">obesity</option>
                <option value="swollen legs">swollen legs</option>
                <option value="mood swings">mood swings</option>
                <option value="restlessness">restlessness</option>
                <option value="swelling joints">swelling joints</option>
                <option value="hip joint pain">hip joint pen</option>
                <option value="movement stiffness">movement stiffness</option>
                <option value="painful walking">painful walking</option>
                <option value="spinning movements">spinning movements</option>
                <option value="scurring">scurring</option>
                <option value="continuous feel of urine">continuous feel of urine</option>
                <option value="silver like dusting">silver like dusting</option>
                <option value="small dents in nails">small dents in nails</option>
                <option value="red sore around nose">red sore around nose</option>
                <option value="yellow crust ooze">yellow crust ooze</option>

            </select>

            <label for="symptom-5">Symptom 5:</label>
            <select id="symptoms-5" name="symptom[]" multiple>
                <option value="cough">cough</option>
                <option value="chest pain">chest pain</option>
                <option value="itching">itching</option>
                <option value="loss of appetite">loss of appetite</option>
                <option value="abdominal pain">abdominal pain</option>
                <option value="internal itching">internal itching</option>
                <option value="passage of gases">passage of gases</option>
                <option value="irregular sugar level">irregular sugar level</option>
                <option value="blurred and distorted vision">blurred and distorted vision</option>
                <option value="family history">family history</option>
                <option value="mucoid sputum">mucoid sputum</option>
                <option value="fatigue">fatigue</option>
                <option value="lack of concentration">lack of concentration</option>
                <option value="excessive hunger">excessive hunger</option>
                <option value="stiff neck">stiff neck</option>
                <option value="loss of balance">loss of balance</option>
                <option value="high fever">high fever</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="nausea">nausea</option>
                <option value="headache">headache</option>
                <option value="dark urine">dark urine</option>
                <option value="yellowing of eyes">yellowing of eyes</option>
                <option value="distention of abdomen">distention of abdomen</option>
                <option value="history of alcohol consumption">history of alcohol consumption</option>
                <option value="breathlessness">breathlessness</option>
                <option value="sweating">sweating</option>
                <option value="irritation in anus">irritation in anus</option>
                <option value="swollen legs">swollen legs</option>
                <option value="swollen blood vessels">swollen blood vessels</option>
                <option value="lethargy">lethargy</option>
                <option value="dizziness">dizziness</option>
                <option value="diarrhoea">diarrhoea</option>
                <option value="swelling joints">swelling joints</option>
                <option value="painful walking">painful walking</option>
                <option value="unsteadiness">unsteadiness</option>
                <option value="small dents in nails">small dents in nails</option>
                <option value="inflammatory nails">inflammatory nails</option>
                <option value="yellow crust ooze">yellow crust ooze</option>


            </select>

            <label for="symptom-6">Symptom 6:</label>
            <select id="symptoms-6" name="symptom[]" multiple>
                <option value="chest pain">chest pain</option>
                <option value="abdominal pain">abdominal pain</option>
                <option value="yellowing of eyes">yellowing of eyes</option>
                <option value="internal itching">internal itching</option>
                <option value="blurred and distorted vision">blurred and distorted vision</option>
                <option value="obesity">obesity</option>
                <option value="mucoid sputum">mucoid sputum</option>
                <option value="stiff neck">stiff neck</option>
                <option value="depression">depression</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="dark urine">dark urine</option>
                <option value="diarrhoea">diarrhoea</option>
                <option value="headache">headache</option>
                <option value="loss of appetite">loss of appetite</option>
                <option value="constipation">constipatiom</option>
                <option value="family history">family history</option>
                <option value="nausea">nausea</option>
                <option value="history of alcohol consumption">history of alcohol consumption</option>
                <option value="fluid overload">fluid overload</option>
                <option value="high fever">high fever</option>
                <option value="breathlessness">breathlessness</option>
                <option value="swelled lymph nodes">swelled lymph nodes</option>
                <option value="sweating">sweating</option>
                <option value="malaise">malaise</option>
                <option value="swollen blood vessels">swollen blood vessels</option>
                <option value="prominent veins on calf">prominent veins on calf</option>
                <option value="dizziness">dizziness</option>
                <option value="puffy face and eyes">puffy face and eyes</option>
                <option value="fast heart rate">fast heart rate</option>
                <option value="painful walking">painful walking</option>
                <option value="inflammatory nails">inflammatory nails</option>

            </select>

            <label for="symptom-7">Symptom 7:</label>
            <select id="symptoms-7" name="symptom[]" multiple>
                <option value="yellowing of eyes">yellowing of eyes</option>
                <option value="obesity">obesity</option>
                <option value="excessive hunger">excessive hunger</option>
                <option value="depression">depression</option>
                <option value="irritability">irritability</option>
                <option value="dark urine">dark urine</option>
                <option value="abdominal pain">abdominal pain</option>
                <option value="muscle pain">muscle pain</option>
                <option value="loss of appetite">loss of appetite</option>
                <option value="mild fever">mild fever</option>
                <option value="headache">headache</option>
                <option value="nausea">nausea</option>
                <option value="constipation">constipation</option>
                <option value="diarrhoea">diarrhoea</option>
                <option value="yellow urine">yellow urine</option>
                <option value="fluid overload">fluid overload</option>
                <option value="breathlessness">breathlessness</option>
                <option value="sweating">sweating</option>
                <option value="swelled lymph nodes">swelled lymph nodes</option>
                <option value="malaise">malaise</option>
                <option value="yellowish skin">yellowish skin</option>
                <option value="phlegm">phlegm</option>
                <option value="prominent veins on calf">prominent veins on calf</option>
                <option value="puffy face and eyes">puffy face and eyes</option>
                <option value="enlarged thyroid">enlarged thyroid</option>
                <option value="fast heart rate">fast heart rate</option>
                <option value="high fever">high fever</option>
                <option value="blurred and distorted vision">blurred and distorted vision</option>

            </select>
            <input type="submit" value="Check">
            <input type="reset" value="Reset">

            <div id="diagnosis-results">
                <?php echo $diseases; ?>
            </div>
        </form>

    </main>
    <script src="js/home.js" defer></script>


</body>

</html>















<div id="diagnosisForm" style="display: none;">
            <h3>Diagnosis</h3>
            <div>
                <?php

                require "connect.php";

                $symptoms_json = "";
                $diseases_json = "";

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // retrieve selected symptom from the user
                    if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
                        $selected_symptoms = $_POST['symptom'];

                        // prepare the SQL query to fetch diseases based on selected symptoms
                        $query = "SELECT DISTINCT disease FROM symptoms WHERE ";
                        $query_weights = "SELECT * FROM severity WHERE symptom IN ('" . implode("','", $selected_symptoms) . "')";

                        // query conditions for each select element
                        $conditions = array();
                        foreach ($selected_symptoms as $selected_symptom) {
                            $conditions[] = "symptom_1 = '$selected_symptom'";
                            $conditions[] = "symptom_2 = '$selected_symptom'";
                            $conditions[] = "symptom_3 = '$selected_symptom'";
                            $conditions[] = "symptom_4 = '$selected_symptom'";
                            $conditions[] = "symptom_5 = '$selected_symptom'";
                            $conditions[] = "symptom_6 = '$selected_symptom'";
                            $conditions[] = "symptom_7 = '$selected_symptom'";
                        }

                        // combine conditions
                        $query .= implode(" OR ", $conditions);

                        $symptoms_json = json_encode($selected_symptoms);

                        // execute query
                        $result = $conn->query($query);
                        $result_weights = $conn->query($query_weights);

                        // fetch results
                        if ($result && $result->num_rows > 0) {
                            $possible_diseases = [];
                            while ($row = $result->fetch_assoc()) {
                                $possible_diseases[] = $row['disease'];
                            }
                        }
                        $diseases_json = json_encode($possible_diseases);

                        // calculate score for each disease based on symptom weights
                        if (!empty($possible_diseases)) {
                            // fetch results
                            if ($result_weights && $result_weights->num_rows > 0) {
                                // initialize array to store weights for each symptom
                                $weights = [];
                                while ($row_weights = $result_weights->fetch_assoc()) {
                                    // store weight for each symptom in array
                                    $weights[$row_weights['symptom']] = (int)$row_weights['weigh'];
                                }

                                // initialize array to store scores for each disease
                                $scores = [];
                                foreach ($possible_diseases as $disease) {
                                    // initialize score for current disease to 0
                                    $scores[$disease] = 0;

                                    // add weight of each selected symptom to score of current disease
                                    foreach ($selected_symptoms as $selected_symptom) {
                                        if (isset($weights[$selected_symptom])) {
                                            // add weight of current symptom to score of current disease
                                            $scores[$disease] += (int)$weights[$selected_symptom];
                                        }
                                    }
                                }

                                // sort diseases by score in descending order
                                arsort($scores);

                                // display the possible diseases with their scores
                                $max_score = max($scores);
                                $diseases = "";
                                $diseases = "Possible diseases based on selected symptoms: <br>'";
                                foreach ($scores as $disease => $score) {
                                    $percentage = ($score / $max_score) * 100;
                                    $diseases .= "<a href='disease_info.php?disease=$disease' target='_blank'>$disease</a> (score: " . $score . ")<br>";
                                    $diseases .= "<progress value='$percentage' max='100' style='color:green'></progress><br>";
                                }
                            } else {
                                // no weights found for selected symptoms
                                $diseases = "No weights found for selected symptoms.";
                            }
                        } else {
                            // no diseases found for selected symptoms
                            $diseases = "No diseases found for selected symptoms.";
                        }
                    } else {
                        // no symptoms selected by user
                        $diseases = "Please select at least one symptom.";
                    }

                    if (isset($_POST['patientname'])) {
                        $patient_name = $_POST['patientname'];
                        $department = $_POST['department'];
                        $date = $_POST['date'];
                        $time = $_POST['time'];

                        $patient_query = "SELECT * FROM patient WHERE patient_name = '$patient_name'";
                        $patient_result = $conn->query($patient_query);

                        if ($patient_result && $patient_result->num_rows > 0) {
                            $patient_row = $patient_result->fetch_assoc();
                            $patient_id = $patient_row['patient_id'];

                            $_SESSION['patient_id'] = $patient_id;

                            echo "Patient ID: " . $patient_id . "<br>";
                            echo "Patient Name: " . $patient_name . "<br>";
                            echo "Department: " . $department . "<br>";
                            echo "Date: " . $date . "<br>";
                            echo "Time: " . $time . "<br>";

                            $diagnosis_query = "SELECT * FROM diagnosis WHERE patient_id = '$patient_id'";
                            $diagnosis_result = $conn->query($diagnosis_query);

                            if ($diagnosis_result && $diagnosis_result->num_rows > 0) {
                                while ($diagnosis_row = $diagnosis_result->fetch_assoc()) {
                                    if ($diagnosis_row['patient_id'] == $patient_id) {
                                        $symptomu = $diagnosis_row['symptoms'];
                                        $diseaso =  $diagnosis_row['diseases'];
                                    }
                                }
                            }
                            $_SESSION["symptoms"] = isset($symptomu) ? json_encode($symptomu) : '';
                            $_SESSION["diseases"] = isset($diseaso) ? json_encode($diseaso) : '';

                            echo "Symptoms: " . (isset($symptomu) ? implode(', ', $symptomu) : '') . "<br>";
                            echo "Diseases: " . (isset($diseaso) ? implode(', ', $diseaso) : '') . "<br>";
                        }
                    }
                }
                $conn->close();
                ?>
            </div>
            <form method="POST">
                <h1>Select symptoms<br><br></h1>
                <label for="symptom-1">Symptom 1:</label>
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

                <label for="symptom-2">Symptom 2:</label>
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

                <label for="symptom-3">Symptom 3:</label>
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

        <?php
        require "connect.php";
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['symptom'])) {

            $patient_id = $_SESSION["patient_id"];

            if (isset($symptoms) && isset($diseases)) {
                $symptoms_json = json_encode($symptoms);
                $diseases_json = json_encode($diseases);
                $x = "INSERT INTO diagnosis(symptoms, diseases, patient_id) VALUES ('$symptoms_json', '$diseases_json', '$patient_id')";
                if ($conn->query($x) === TRUE) {
                    $diagnosis_id = $conn->insert_id;
                    echo "Diagnosis data inserted successfully.<br>";
                } else {
                    echo "Error inserting diagnosis data: " . $conn->error;
                }
            }

            // Store symptoms and diseases in session variables
            $_SESSION["symptoms"] = isset($symptoms_json) ? $symptoms_json : '';
            $_SESSION["diseases"] = isset($diseases_json) ? $diseases_json : '';
        }
        ?>

        <div id="bookAppointmentForm" style="display: none;">
            <h3>Patient Diagnosis and Appointment</h3>
            <form method="POST">
                <h3>Book Appointment</h3>
                <label for="patientname">Patient Name:</label>
                <input type="text" id="patientname" name="patientname">
                <label for="department">Select Department:</label>
                <select id="department" name="department">
                    <option value="Internal Medicine">Internal Medicine</option>
                    <option value="Infectious Diseases">Infectious Diseases</option>
                    <option value="Allergy & Immunology">Allergy & Immunology</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Orthopedics">Orthopedics</option>
                    <option value="Gastroenterology">Gastroenterology</option>
                    <option value="ENT">ENT</option>
                    <option value="Surgery">Surgery</option>
                    <option value="Urology">Urology</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Pulmonology">Pulmonology</option>
                </select>
                <label for="date">Select Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Select Time:</label>
                <input type="time" id="time" name="time" required>
                <button id="book-appointment-btn">Book Appointment</button>
                <?php
                require "connect.php";
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['patientname'])) {

                    // Retrieve data from session variables
                    $patient_id = $_SESSION["patient_id"];
                    $symptomu = json_decode($_SESSION["symptoms"]);
                    $diseaso = json_decode($_SESSION["diseases"]);

                    $symptomu_json = json_encode($symptomu);
                    $diseaso_json = json_encode($diseaso);

                    // Insert appointment data into database
                    $y = "INSERT INTO appointments(patient_id, patient_name, symptoms, diseases, department, date, time) VALUES ('$patient_id', '$patient_name', '$symptomu_json', '$diseaso_json', '$department', '$date', '$time')";
                    if ($conn->query($y) === TRUE) {
                        echo "Appointment booked successfully!";
                    } else {
                        echo "Error booking appointment: " . $conn->error;
                    }
                }

                $conn->close();
                ?>
            </form>
        </div>