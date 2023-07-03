<?php
session_start();
?>

<DOCTYPE html>
    <html>

    <head>
        <title>Reception Desk</title>
        <link rel="stylesheet" href="css\home.css" />

        <style>
            body {
                font-size: 1rem;
                font-weight: normal;
                color: #60698d;
                line-height: 1.5;
                font-family: Verdana, Geneva, Tahoma, sans-serif;
                overflow: auto;

            }

            header h1 {
                color: white;
                font-size: xx-large;
            }

            .tiles-container {
                display: flex;
                flex-wrap: wrap;
            }

            .tile {
                width: 300px;
                height: 150px;
                border: 1px solid #ccc;
                border-radius: 5px;
                margin: 10px;
                padding: 20px;
                display: flex;
                align-items: center;
                justify-content: center;
                cursor: pointer;
            }

            .container {
                width: 100%;
                margin: 0 auto;
                padding: 0 1.5rem;
                display: flex;
                align-items: center;
            }

            header {
                height: 120px;
                /* position: fixed; */
                top: 0;
                right: 0;
                width: 100%;
                background-color: #487cff;
            }

            .logo img {
                width: 50px;
                height: 50px;
                margin-right: 10px;
                margin-top: 20px;
                opacity: 1;
            }

            #title {
                text-align: center;
                align-content: center;
            }

            .patient-registration,
            .patient-list {
                margin-bottom: 30px;
            }

            .form-container {
                max-width: 500px;
                margin: 0 auto;
                padding: 20px;
                background-color: #487cff;
                border-radius: 5px;
            }

            h2,
            h3 {
                color: #333;
                margin-bottom: 10px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }

            input[type="text"],
            input[type="tel"],
            input[type="email"],
            select,
            textarea {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
                font-size: 14px;
                margin-bottom: 10px;
            }

            input[type="radio"] {
                margin-right: 5px;
            }

            input[type="submit"],
            input[type="reset"],
            #book-appointment-btn {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px 15px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }

            input[type="submit"]:hover,
            input[type="reset"]:hover {
                background-color: #45a049;
            }

            #parent-info {
                display: none;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table th,
            table td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            table th {
                background-color: #f2f2f2;
            }

            table tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            table tr:hover {
                background-color: #e6e6e6;
            }

            /* #select-container {
                display: flex;
                flex-direction: column;
            }

            #select-container label,
            #select-container select {
                display: none;
            }

            #select-container label:first-of-type,
            #select-container select:first-of-type {
                display: block;
            } */
        </style>
    </head>

    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <img src="img\logo\ujuzi-dawa-logo-removebg-preview.png" alt="Logo">
                </div>
                <div id="title">
                    <h1>Receptionist Desk</h1>
                </div>
                <div>
                    <button id="logout"><a href="#">Logout</a></button>
                </div>

            </div>
        </header>

        <div class="tiles-container">
            <div id="patientRegistrationTile" class="tile">
                <h2>Patient Registration</h2>
            </div>
            <div id="diagnosisTile" class="tile">
                <h2>Diagnosis</h2>
            </div>
            <div id="bookAppointmentTile" class="tile">
                <h2>Appointment</h2>
            </div>
            <div id="patientReportTile" class="tile">
                <h2>Reports</h2>
            </div>
        </div>

        <div id="patientReport" style="display: none;">
            <h3>Reports</h3>
            <div class="patient-list">
                <h3>Registered Patients</h3>
                <?php
                require "connect.php";

                // Fetch the registered users' information
                $sqlll = "SELECT * FROM patient";
                $resulttt = $conn->query($sqlll);

                if ($resulttt->num_rows > 0) {
                    // Display the table header
                    echo "<table>";
                    echo "<tr>
                    <th>Health Number</th>
                    <th>Patient Name</th>
                    <th>Gender</th>
                    <th>Date of Birth</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Marital Status</th>
                    <th>Is Under 18</th>
                    <th>Parent Name</th>
                    <th>Parent Phone Number</th>
                    <th>Emergency Contact Name</th>
                    <th>Emergency Contact Relationship</th>
                    <th>Emergency Contact Phone Number</th>
                    <th>Reason for Registration</th>
                    <th>Taking Medications</th>
                    </tr>";

                    // Loop through each row of the result set
                    while ($rowww = $resulttt->fetch_assoc()) {
                        // Display the table rows with user data
                        echo "<tr>";
                        echo "<td>" . $rowww["health_number"] . "</td>";
                        echo "<td>" . $rowww["patient_name"] . "</td>";
                        echo "<td>" . $rowww["gender"] . "</td>";
                        echo "<td>" . $rowww["date_of_birth"] . "</td>";
                        echo "<td>" . $rowww["phone_number"] . "</td>";
                        echo "<td>" . $rowww["email"] . "</td>";
                        echo "<td>" . $rowww["address"] . "</td>";
                        echo "<td>" . $rowww["marital_status"] . "</td>";
                        echo "<td>" . ($rowww["is_under_18"] === "Yes" ? "Yes" : "No") . "</td>";
                        echo "<td>" . $rowww["parent_name"] . "</td>";
                        echo "<td>" . $rowww["parent_phone_number"] . "</td>";
                        echo "<td>" . $rowww["emergency_contact_name"] . "</td>";
                        echo "<td>" . $rowww["emergency_contact_relationship"] . "</td>";
                        echo "<td>" . $rowww["emergency_contact_phone_number"] . "</td>";
                        echo "<td>" . $rowww["reason_for_registration"] . "</td>";
                        echo "<td>" . ($rowww["taking_medications"] === "Yes" ? "Yes" : "No") . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // No registered users found
                    echo "No registered users.";
                }

                // Close the result and connection
                $resulttt->close();
                $conn->close();
                ?>
            </div>
        </div>


        <div id="patientRegistrationForm" style="display: none;">
            <!-- Add the patient registration form here -->
            <div class="patient-registration">
                <form action="" method="POST" class="form-container">
                    <h3 style="color: white;">Patient Registration Form</h3>
                    <label for="registration-date">Registration Date:</label>
                    <input type="datetime-local" id="registration-date" name="registration-date" required><br><br>

                    <label for="health-number">Health Number:</label>
                    <input type="text" id="health-number" name="health-number" required><br><br>

                    <label for="patient-name">Patient Name:</label>
                    <input type="text" id="patient-name" name="patient-name" required><br><br>

                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select><br><br>

                    <label for="date-of-birth">Date of Birth:</label>
                    <input type="date" id="date-of-birth" name="date-of-birth" required><br><br>

                    <label for="phone-number">Phone Number:</label>
                    <input type="tel" id="phone-number" name="phone-number" pattern="[0-9]{10}" required><br><br>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required><br><br>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required><br><br>

                    <label for="marital-status">Marital Status:</label>
                    <select id="marital-status" name="marital-status" required>
                        <option value="">Select Marital Status</option>
                        <option value="single">Single</option>
                        <option value="married">Married</option>
                        <option value="divorced">Divorced</option>
                        <option value="widowed">Widowed</option>
                    </select><br><br>

                    <label for="age-check">Is the Patient Younger than 18:</label><br>
                    <input type="radio" id="age-check-yes" name="age-check" value="yes">
                    <label for="age-check-yes">Yes</label>
                    <input type="radio" id="age-check-no" name="age-check" value="no">
                    <label for="age-check-no">No</label><br><br>

                    <div id="parent-info" style="display: none;">
                        <label for="parent-name">Parent Name:</label>
                        <input type="text" id="parent-name" name="parent-name"><br><br>

                        <label for="parent-phone">Parent Phone Number:</label>
                        <input type="tel" id="parent-phone" name="parent-phone" pattern="[0-9]{10}"><br><br>
                    </div>

                    <h3>Emergency Contact</h3>
                    <label for="emergency-name">Name:</label>
                    <input type="text" id="emergency-name" name="emergency-name" required><br><br>

                    <label for="emergency-relationship">Relationship:</label>
                    <input type="text" id="emergency-relationship" name="emergency-relationship" required><br><br>

                    <label for="emergency-phone">Phone Number:</label>
                    <input type="tel" id="emergency-phone" name="emergency-phone" pattern="[0-9]{10}" required><br><br>

                    <h3>Health History</h3>
                    <label for="reason-for-registration">Reason for Registration:</label>
                    <textarea id="reason-for-registration" name="reason-for-registration" required></textarea><br><br>

                    <label for="medications">Taking any Medications:</label><br>
                    <input type="radio" id="medications-yes" name="medications" value="yes">
                    <label for="medications-yes">Yes</label>
                    <input type="radio" id="medications-no" name="medications" value="no">
                    <label for="medications-no">No</label><br><br>

                    <input type="submit" name="register" value="Register">
                    <input type="reset" value="Reset">
                </form>
                <?php
                require "connect.php";
                if (empty($_POST['health-number']) || empty($_POST['patient-name']) || empty($_POST['gender']) || empty($_POST['date-of-birth']) || empty($_POST['phone-number']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['marital-status'])) {
                    echo "Please fill in all required fields.";
                } else {
                    // Retrieve the form inputs
                    $registrationDatetime = $_POST['registration-date'];
                    $healthNumber = $_POST['health-number'];
                    $patientName = $_POST['patient-name'];
                    $gender = $_POST['gender'];
                    $dateOfBirth = $_POST['date-of-birth'];
                    $phoneNumber = $_POST['phone-number'];
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $maritalStatus = $_POST['marital-status'];
                    $isUnder18 = isset($_POST['age-check']) ?  1 : 0;
                    $parentName = $_POST['parent-name'];
                    $parentPhoneNumber = $_POST['parent-phone'];
                    $emergencyContactName = $_POST['emergency-name'];
                    $emergencyContactRelationship = $_POST['emergency-relationship'];
                    $emergencyContactPhoneNumber = $_POST['emergency-phone'];
                    $reasonForRegistration = $_POST['reason-for-registration'];
                    $takingMedications = isset($_POST['medications']) ? 1 : 0;

                    // Convert boolean values to "Yes" or "No"
                    $isUnder18Text = $isUnder18 ?  "No" : "Yes";
                    $takingMedicationsText = $takingMedications ? "No" : "Yes";


                    // Prepare the SQL statement
                    $sql = "INSERT INTO patient (registration_datetime, health_number, patient_name, gender, date_of_birth, phone_number, email, address, marital_status, is_under_18, parent_name, parent_phone_number, emergency_contact_name, emergency_contact_relationship, emergency_contact_phone_number, reason_for_registration, taking_medications) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                    // Prepare and bind the parameters
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sssssssssssssssss", $registrationDatetime, $healthNumber, $patientName, $gender, $dateOfBirth, $phoneNumber, $email, $address, $maritalStatus, $isUnder18Text, $parentName, $parentPhoneNumber, $emergencyContactName, $emergencyContactRelationship, $emergencyContactPhoneNumber, $reasonForRegistration, $takingMedicationsText);

                    // Execute the statement
                    if ($stmt->execute()) {
                        // Registration successful, display success message or redirect
                        echo "Registration successful!";
                    } else {
                        // Check for duplicate entry error
                        if ($conn->errno == 1062) {
                            echo "User already exists.";
                        } else {
                            echo "Error occurred. Contact IT!";
                        }
                    }
                    $stmt->close();
                }

                // Close the statement and database connection

                $conn->close();
                ?>

            </div>
            <!-- Include the necessary form fields and submit button -->
        </div>

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

                            echo "Patient ID: " . $patient_id . "<br>";
                            echo "Patient Name: " . $patient_name . "<br>";
                            echo "Department: " . $department . "<br>";
                            echo "Date: " . $date . "<br>";
                            echo "Time: " . $time . "<br>";

                            $diagnosis_query = "SELECT * FROM diagnosis";
                            $diagnosis_result = $conn->query($diagnosis_query);

                            if ($diagnosis_result && $diagnosis_result->num_rows > 0) {
                                $diagnosis_row = $diagnosis_result->fetch_assoc();
                                $symptomu = $diagnosis_row['symptoms'];
                                $diseaso =  $diagnosis_row['diseases'];
                            }

                            echo "Symptoms: " . $symptomu . "<br>";
                            echo "Diseases: " . $diseaso . "<br>";
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

                <?php
                require "connect.php";
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['symptom'])) {

                    $x = "INSERT INTO diagnosis(symptoms, diseases) VALUES ('$symptoms_json', '$diseases_json')";
                    $conn->query($x);
                ?>
                    <div id="diagnosis-results">
                        Symptoms: <?php echo $symptoms_json; ?> <br>
                        Diseases: <?php echo $diseases_json; ?> <br>
                    </div>
                <?php } ?>


            </form>
        </div>

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

                    $y = "INSERT INTO appointments(patient_id, patient_name, symptoms, diseases, department, date, time) VALUES ('$patient_id', '$patient_name','$symptomu', '$diseaso', '$department', '$date', '$time')";

                    // Check if the insertion was successful
                    if ($conn->query($y) === TRUE) {
                        echo "Appointment booked successfully!.";
                    } else {
                        echo "Error: " . $conn->error;
                    }
                } else {
                    echo "Patient not found!";
                }
                ?>
            </form>
        </div>


        <script src="js/home.js" defer></script>

        <script>
            var patientRegistrationTile = document.getElementById("patientRegistrationTile");
            var patientRegistrationForm = document.getElementById("patientRegistrationForm");
            var bookAppointmentTile = document.getElementById("bookAppointmentTile");
            var bookAppointmentForm = document.getElementById("bookAppointmentForm");
            var diagnosisTile = document.getElementById("diagnosisTile");
            var diagnosisForm = document.getElementById("diagnosisForm");
            var patientReportTile = document.getElementById("patientReportTile");
            var patientReport = document.getElementById("patientReport")

            patientRegistrationTile.addEventListener("click", function() {
                patientRegistrationForm.style.display = "block";
                diagnosisForm.style.display = "none";
                patientReport.style.display = "none";
                bookAppointmentForm.style.display = "none";
            });

            bookAppointmentTile.addEventListener("click", function() {
                patientRegistrationForm.style.display = "none";
                bookAppointmentForm.style.display = "block";
                diagnosisForm.style.display = "none";
                patientReport.style.display = "none";
            });

            diagnosisTile.addEventListener("click", function() {
                patientRegistrationForm.style.display = "none";
                bookAppointmentForm.style.display = "none";
                diagnosisForm.style.display = "block";
                patientReport.style.display = "none";
            });

            patientReportTile.addEventListener("click", function() {
                patientRegistrationForm.style.display = "none";
                bookAppointmentForm.style.display = "none";
                diagnosisForm.style.display = "none";
                patientReport.style.display = "block";
            });
        </script>
        <!-- <script>
            // Get the select elements and store them in an array
            var selectElements = Array.from(document.querySelectorAll('#select-container select'));

            // Function to show a select element
            function showSelectElement(index) {
                selectElements[index].style.display = 'block';
            }

            // Function to hide a select element
            function hideSelectElement(index) {
                selectElements[index].style.display = 'none';
            }

            // Hide all select elements except the first one initially
            for (var i = 1; i < selectElements.length; i++) {
                hideSelectElement(i);
            }

            // Get the "Show More" button element
            var showMoreButton = document.getElementById('show-more-button');

            // Event listener for the "Show More" button click
            showMoreButton.addEventListener('click', function() {
                // Loop through the hidden select elements and show them
                for (var i = 1; i < selectElements.length; i++) {
                    showSelectElement(i);
                }

                // Hide the "Show More" button
                showMoreButton.style.display = 'none';
            });
        </script> -->
        <script>
            // document.getElementById('check').addEventListener('click', function(event) {
            //     event.preventDefault();
            // });

            // document.getElementById('reset').addEventListener('click', function(event) {
            //     event.preventDefault();
            // });

            // document.getElementById('book-appointment-btn').addEventListener('click', function(event) {
            //     event.preventDefault();
            // });
        </script>
    </body>

    </html>