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

            .form-group {
                display: flex;
            }

            .form-group>div {
                flex: 1;
                margin-right: 10px;
            }

            .form-group>div:last-child {
                margin-right: 0;
            }

            summary {
                font-size: 1rem;
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

            .card-container {
                display: flex;
                flex-wrap: wrap;
            }

            .card {
                width: 300px;
                margin: 10px;
                border: 1px solid #ccc;
                box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
            }

            .card-header {
                background-color: #f4f4f4;
                padding: 10px;
            }

            .card-header h3 {
                margin: 0;
            }

            .card-body {
                padding: 10px;
            }

            .modal {
                display: none;
                position: fixed;
                z-index: 1;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: auto;
                background-color: rgba(0, 0, 0, 0.4);
            }

            .modal-content {
                background-color: #fefefe;
                margin: 15% auto;
                padding: 20px;
                border: 1px solid #888;
                width: 80%;
            }

            .close {
                color: #aaa;
                float: right;
                font-size: 28px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: black;
                text-decoration: none;
                cursor: pointer;
            }

            .back {
                margin-top: 20px;
            }

            .back-button {
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
            <a href="receptionist.php" class="back-button">Back to Dashboard</a>
        </div>
        <div class="dashboard">
            <div id="patientRegistrationForm">
                <?php if (!empty($errors)) : ?>
                    <div class="error">
                        <p>echo $errs;</p>
                    <?php endif; ?>
                    </div>
                    <div class="patient-registration">
                        <form action="" method="POST" class="form-container">
                            <input type="hidden" name="form-submitted" value="1">


                            <h3 style="color: white;">Patient Registration Form</h3>
                            <div class="form-group">
                                <div>
                                    <label for="registration-date">Registration Date:</label>
                                    <input type="datetime-local" id="registration-date" name="registration-date" required value="<?php echo isset($_POST['registration-date']) ? htmlspecialchars($_POST['registration-date']) : ''; ?>"><br><br>
                                </div>
                                <div>
                                    <label for="health-number">Health Number:</label>
                                    <input type="text" id="health-number" name="health-number" required value="<?php echo isset($_POST['health-number']) ? htmlspecialchars($_POST['health-number']) : ''; ?>"><br><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="patient-name">Patient Name:</label>
                                    <input type="text" id="patient-name" name="patient-name" required value="<?php echo isset($_POST['patient-name']) ? htmlspecialchars($_POST['patient-name']) : ''; ?>"><br><br>
                                </div>
                                <div>
                                    <label for="gender">Gender:</label>
                                    <select id="gender" name="gender" required>
                                        <option value="">Select Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                        <option value="other">Other</option>
                                    </select><br><br>
                                </div>
                                <div>

                                    <label for="date-of-birth">Date of Birth:</label>
                                    <input type="date" id="date-of-birth" name="date-of-birth" required><br><br>
                                    <?php if (isset($errors['date-of-birth'])) : ?>
                                        <span class="error"><?php echo $errors['date-of-birth']; ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="phone-number">Phone Number:</label>
                                    <input type="tel" id="phone-number" name="phone-number" pattern="[0-9]{10}" required><br><br>
                                    <?php if (isset($errors['phone-number'])) : ?>
                                        <span class="error"><?php echo $errors['phone-number']; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <label for="email">Email:</label>
                                    <input type="email" id="email" name="email" required><br><br>
                                    <?php if (isset($errors['email'])) : ?>
                                        <span class="error"><?php echo $errors['email']; ?></span>
                                    <?php endif; ?>
                                </div>
                                <div>
                                    <label for="address">Address:</label>
                                    <input type="text" id="address" name="address" required><br><br>
                                </div>
                            </div>
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
                                <input type="tel" id="parent-phone" name="parent-phone" pattern="[0-9]{10}">
                            </div>
                            <details>
                                <summary>Emergency Contact</summary>
                                <label for="emergency-name">Name:</label>
                                <input type="text" id="emergency-name" name="emergency-name" required><br><br>

                                <label for="emergency-relationship">Relationship:</label>
                                <input type="text" id="emergency-relationship" name="emergency-relationship" required><br><br>

                                <label for="emergency-phone">Phone Number:</label>
                                <input type="tel" id="emergency-phone" name="emergency-phone" pattern="[0-9]{10}" required><br><br>
                            </details>
                            <details>
                                <summary>Health History</summary>
                                <label for="reason-for-registration">Reason for Registration:</label>
                                <textarea id="reason-for-registration" name="reason-for-registration" required></textarea><br><br>

                                <label for="medications">Taking any Medications:</label><br>
                                <input type="radio" id="medications-yes" name="medications" value="yes">
                                <label for="medications-yes">Yes</label>
                                <input type="radio" id="medications-no" name="medications" value="no">
                                <label for="medications-no">No</label><br><br>
                            </details>
                            <input type="submit" name="register" value="Register">
                            <input type="reset" value="Reset">
                        </form>
                        <?php
                        require "connect.php";

                        if (isset($_POST['form-submitted'])) {

                            $errors = array();

                            if (empty($_POST['health-number']) || empty($_POST['patient-name']) || empty($_POST['gender']) || empty($_POST['date-of-birth']) || empty($_POST['phone-number']) || empty($_POST['email']) || empty($_POST['address']) || empty($_POST['marital-status']) || empty($_POST['reason-for-registration'])) {
                                $error[] = "Please fill in all required fields.";
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

                                // Validate date of birth
                                $dateOfBirthTimestamp = strtotime($dateOfBirth);
                                if ($dateOfBirthTimestamp === false) {
                                    $errors['date-of-birth'] = "Invalid date of birth";
                                } elseif ($dateOfBirthTimestamp > time()) {
                                    $errors['date-of-birth'] = "Date of birth must be in the past";
                                }

                                // Validate phone number
                                if (!preg_match('/^\d{10}$/', $phoneNumber)) {
                                    $errors['phone-number'] = "Invalid phone number";
                                }

                                // Validate email
                                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                    $errors['email'] = "Invalid email address";
                                }
                            }
                            if (!empty($errors)) {
                                $errs = implode("<br>", $errors);
                            } else {

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
                        }
                        $conn->close();
                        ?>

                    </div>
            </div>
    </body>
    <html>