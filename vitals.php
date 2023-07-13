<?php
session_start();
?>
<DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UjuziDawa || Medical Diagnosis System</title>
        <link rel="stylesheet" href="css\home.css">
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

            .container {
                width: 100%;
                margin: 0 auto;
                padding: 0 1.5rem;
                display: flex;
                align-items: center;
            }

            header {
                height: 120px;
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
        </style>
    </head>

    <body>
        <div class="back">
            <a href="nurse.php" class="back-button">Back to Dashboard</a>
        </div>
        <div>
            <form method="POST" class="form-container">
                <h3>Patient Vitals</h3>
                <input type="hidden" name="form-submitted" value="1">

                <label for="health-number">Health Number:</label>
                <input type="text" id="health-number" name="health-number" required><br><br>

                <label for="temperature">Temperature (°C):</label>
                <input type="number" id="temperature" name="temperature" required><br><br>

                <label for="blood-pressure">Blood Pressure (mmHg):</label>
                <input type="text" id="blood-pressure" name="blood-pressure" required><br><br>

                <label for="heart-rate">Heart Rate (bpm):</label>
                <input type="number" id="heart-rate" name="heart-rate" required><br><br>

                <label for="respiratory-rate">Respiratory Rate (breaths/min):</label>
                <input type="number" id="respiratory-rate" name="respiratory-rate" required><br><br>

                <input type="submit" value="Submit">
            </form>

            <?php
            require "connect.php";

            if (isset($_POST['form-submitted'])) {
                $healthNumber = $_POST['health-number'];
                $temperature = $_POST['temperature'];
                $bloodPressure = $_POST['blood-pressure'];
                $heartRate = $_POST['heart-rate'];
                $respiratoryRate = $_POST['respiratory-rate'];

                $errors = array();
                if (empty($healthNumber)) {
                    $errors[] = "Health number is required.";
                }
                if (empty($temperature)) {
                    $errors[] = "Temperature is required.";
                } elseif (!is_numeric($temperature)) {
                    $errors[] = "Temperature must be a number.";
                }
                if (empty($bloodPressure)) {
                    $errors[] = "Blood pressure is required.";
                }
                if (empty($heartRate)) {
                    $errors[] = "Heart rate is required.";
                } elseif (!is_numeric($heartRate)) {
                    $errors[] = "Heart rate must be a number.";
                }
                if (empty($respiratoryRate)) {
                    $errors[] = "Respiratory rate is required.";
                } elseif (!is_numeric($respiratoryRate)) {
                    $errors[] = "Respiratory rate must be a number.";
                }

                if (!empty($errors)) {
                    echo "<ul>";
                    foreach ($errors as $error) {
                        echo "<li>" . htmlspecialchars($error) . "</li>";
                    }
                    echo "</ul>";
                } else {
                    $sql = "INSERT INTO vitals (health_number, recorded_at, temperature, blood_pressure, heart_rate, respiratory_rate) VALUES (?, NOW(), ?, ?, ?, ?)";
                    echo "Hello" . $sql;
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("sddii", $healthNumber, $temperature, $bloodPressure, $heartRate, $respiratoryRate);
                    $stmt->execute();

                    if ($stmt->affected_rows > 0) {
                        echo "Patient vitals recorded successfully.";
                    } else {
                        echo "Failed to record patient vitals.";
                    }
                    $stmt->close();
                }
            }
            $conn->close();
            ?>



        </div>
    </body>
    <html>