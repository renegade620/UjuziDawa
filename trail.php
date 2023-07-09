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


        <?php
        // Establish database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ujuzidawa";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $symptoms_json = "";
        $diseases_json = "";

        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Check if the diagnosis form is submitted
            if (isset($_POST['symptom']) && is_array($_POST['symptom'])) {
                $selected_symptoms = $_POST['symptom'];

                // Prepare the SQL query to fetch diseases based on selected symptoms
                $query = "SELECT DISTINCT disease FROM symptoms WHERE ";
                $query_weights = "SELECT * FROM severity WHERE symptom IN ('" . implode("','", $selected_symptoms) . "')";

                // Query conditions for each selected symptom
                $conditions = array();
                foreach ($selected_symptoms as $selected_symptom) {
                    $conditions[] = "symptom_1 = '$selected_symptom'";
                }

                // Combine conditions
                $query .= implode(" OR ", $conditions);

                $symptoms_json = json_encode($selected_symptoms);

                // Execute query to fetch diseases
                $result = $conn->query($query);
                $result_weights = $conn->query($query_weights);

                // Fetch results
                if ($result && $result->num_rows > 0) {
                    $possible_diseases = [];
                    while ($row = $result->fetch_assoc()) {
                        $possible_diseases[] = $row['disease'];
                    }
                }

                // Calculate score for each disease based on symptom weights
                if (!empty($possible_diseases)) {
                    // Fetch results
                    if ($result_weights && $result_weights->num_rows > 0) {
                        // Initialize array to store weights for each symptom
                        $weights = [];
                        while ($row_weights = $result_weights->fetch_assoc()) {
                            // Store weight for each symptom in the array
                            $weights[$row_weights['symptom']] = (int)$row_weights['weigh'];
                        }

                        // Initialize array to store scores for each disease
                        $scores = [];
                        foreach ($possible_diseases as $disease) {
                            // Initialize score for the current disease to 0
                            $scores[$disease] = 0;

                            // Add weight of each selected symptom to the score of the current disease
                            foreach ($selected_symptoms as $selected_symptom) {
                                if (isset($weights[$selected_symptom])) {
                                    // Add weight of the current symptom to the score of the current disease
                                    $scores[$disease] += (int)$weights[$selected_symptom];
                                }
                            }
                        }

                        // Sort diseases by score in descending order
                        arsort($scores);

                        // Store the selected symptoms and possible diseases in JSON format
                        $diseases_json = json_encode($possible_diseases);
                    }
                }
            } elseif (isset($_POST['patientname'])) {
                // The appointment form is submitted
                $patient_name = $_POST['patientname'];
                $department = $_POST['department'];
                $date = $_POST['date'];
                $time = $_POST['time'];

                $patient_query = "SELECT * FROM patient WHERE patient_name = '$patient_name'";
                $patient_result = $conn->query($patient_query);


                if ($patient_result && $patient_result->num_rows > 0) {
                    $patient_row = $patient_result->fetch_assoc();
                    $patient_id = $patient_row['patient_id'];

                    echo $patient_id;
                    echo $patient_name;
                    echo $department;
                    echo $date;
                    echo $time;

                    // Insert the appointment into the appointments table
                    $appointment_query = "INSERT INTO appointment (patient_id, department, date, time, symptoms) VALUES ('$patient_id', '$department', '$date', '$time', '$symptoms_json')";

                    if (!empty($selected_symptoms) && !empty($possible_diseases)) {
                        if ($conn->query($appointment_query) === TRUE) {
                            echo "Appointment booked successfully!";
                        } else {
                            echo "Error: " . $appointment_query . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }

        // Close the database connection
        $conn->close();
        ?>

        <form method="POST">
            <h1>Select symptoms</h1>
            <label for="symptom-1">Symptom 1:</label>
            <select id="symptoms-1" name="symptom[]" multiple>
                <!-- options for symptoms -->
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
            <input type="submit" value="Check">
            <input type="reset" value="Reset">
        </form>

        <?php if (isset($symptoms_json) && isset($diseases_json)) : ?>
            <div id="diagnosis-results">
                <h3>Possible Diseases:</h3>
                <?php
                $symptoms = json_decode($symptoms_json);
                $diseases = json_decode($diseases_json);

                if (!empty($diseases)) {
                    echo "<ul>";
                    foreach ($diseases as $disease) {
                        echo "<li>$disease</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "No diseases found based on the selected symptoms.";
                }
                ?>
            </div>

            <h3>Patient Diagnosis and Appointment</h3>
            <form method="POST">
                <h3>Book Appointment</h3>
                <label for="patientname">Patient Name:</label>
                <input type="text" id="patientname" name="patientname">
                <label for="department">Select Department:</label>
                <select id="department" name="department">
                    <!-- options for departments -->
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
                <input type="hidden" name="symptoms_json" value="<?php echo $symptoms_json; ?>">
                <input type="hidden" name="diseases_json" value="<?php echo $diseases_json; ?>">
                <button id="book-appointment-btn">Book Appointment</button>
            </form>
        <?php endif; ?>

    </body>

    </html>