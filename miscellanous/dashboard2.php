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

    // retrieve selected symptom from the user
    if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
        $selected_symptoms = $_POST['symptom'];

        // prepare the SQL query to fetch diseases based on selected symptoms
        $query = "SELECT DISTINCT disease FROM symptoms WHERE ";

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
        $diseases = "";
        if (!empty($possible_diseases)) {
            $diseases .= "Possible diseases based on selected symptoms:<br>";
            foreach ($possible_diseases as $disease) {
                $diseases .= "- " . $disease . "<br>";
            }
        } else {
            $diseases .= "No diseases found for the selected symptoms.";
        }
    } else {
        // query execution failed
        echo "Error executing query: " . $conn->error;
    }

    // close the database connection
    $conn->close();
    ?> 
    
    <!DOCTYPE html>
    <html lang="en">


    <?php

    ?>

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
                    <img src=".\img\logo\ujuzi-dawa-logo.png" alt="" class="logo-img" />
                </div>
                <form>
                    <div class="search">
                        <input type="text" placeholder="Search Diseases..." />
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
                </div>
                <div class="banner-img">
                    <img src="img\hero\medcare.jpg" alt="Banner" />
                </div>
            </div>
        </section>
        <main>
            <form method="POST">
                <h1>Select symptoms<br><br</h1>
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