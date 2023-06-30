<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- <link rel="stylesheet" href="css\home.css"/> -->
    <title>UjuziDawa || Medical Diagnosis System</title>
    <style>
        /* Global styles */
        body {
            font-size: 1rem;
            font-weight: normal;
            color: #60698d;
            line-height: 1.5;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            overflow: auto;

        }

        .container {
            width: 100%;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
        }

        /* Header styles */
        header {
            height: 80px;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            background-color: #487cff;
        }

        .logo img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }

        nav ul {
            list-style: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            margin-left: 10px;
            display: flex;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* nav ul li a:hover {
            text-decoration: underline;
        } */

        /* Sidebar styles */
        .sidebar {
            width: 25%;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .sidebar h2 {
            font-size: 1.2rem;
            margin-top: 0;
        }

        /* Main content styles */
        .main-content {
            width: 75%;
            padding: 20px;
        }

        .main-content h1 {
            font-size: 1.5rem;
        }

        .dashboard-overview {
            margin-bottom: 30px;
        }

        .dashboard-overview h3 {
            font-size: 1.2rem;
        }

        .patient-registration,
        .patient-list,
        .appointment-scheduler {
            margin-bottom: 30px;
        }

        /* Footer styles */
        footer {
            background-color: #487cff;
            color: #fff;
            padding: 10px;
            text-align: center;
            width: 100%;
        }

        /* Style the form container */
        .form-container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #487cff;
            border-radius: 5px;
        }

        /* Style form headings */
        h2,
        h3 {
            color: #333;
            margin-bottom: 10px;
        }

        /* Style form labels */
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        /* Style form input fields */
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

        /* Style radio button labels */
        input[type="radio"] {
            margin-right: 5px;
        }

        /* Style the submit and reset buttons */
        input[type="submit"],
        input[type="reset"] {
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

        /* Style the hidden parent info section */
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

    <body>
        <header>
            <div class="container">
                <div class="logo">
                    <img src="./img/logo/ujuzi-dawa-logo.png" alt="Logo">
                </div>
                <nav>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Patients</a></li>
                        <li><a href="#">Appointments</a></li>
                        <li><a href="#">Reports</a></li>
                        <li id="logout"><a href="#">Logout</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <!-- <div class="container">
            <aside class="sidebar">
                <h2>Menu</h2>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Patients</a></li>
                    <li><a href="#">Appointments</a></li>
                    <li><a href="#">Reports</a></li>
                </ul>
            </aside> -->

        <main class="main-content">
            <h1>Welcome, Receptionist!</h1>
            <div class="dashboard-overview">
                <h3>Patients</h3>
                <!-- Dashboard overview content here -->
            </div>
            <div class="patient-list">
                <h3>Registered Patients</h3>
                <?php
                require "connect.php";

                // Fetch the registered users' information
                $sql = "SELECT * FROM patient";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
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
                    while ($row = $result->fetch_assoc()) {
                        // Display the table rows with user data
                        echo "<tr>";
                        echo "<td>" . $row["health_number"] . "</td>";
                        echo "<td>" . $row["patient_name"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["date_of_birth"] . "</td>";
                        echo "<td>" . $row["phone_number"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["address"] . "</td>";
                        echo "<td>" . $row["marital_status"] . "</td>";
                        echo "<td>" . ($row["is_under_18"] === "Yes" ? "Yes" : "No") . "</td>";
                        echo "<td>" . $row["parent_name"] . "</td>";
                        echo "<td>" . $row["parent_phone_number"] . "</td>";
                        echo "<td>" . $row["emergency_contact_name"] . "</td>";
                        echo "<td>" . $row["emergency_contact_relationship"] . "</td>";
                        echo "<td>" . $row["emergency_contact_phone_number"] . "</td>";
                        echo "<td>" . $row["reason_for_registration"] . "</td>";
                        echo "<td>" . ($row["taking_medications"] === "Yes" ? "Yes" : "No") . "</td>";
                        echo "</tr>";
                    }

                    // Close the table
                    echo "</table>";
                } else {
                    // No registered users found
                    echo "No registered users.";
                }

                // Close the result and connection
                $result->close();
                $conn->close();
                ?>
            </div>
            <div class="patient-registration">
                <h3>Patient Registration</h3>
                <form action="" method="POST" class="form-container">
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

            <div class="appointment-scheduler">
                <h3>Appointment Scheduler</h3>
                <?php

                ?>
            </div>
        </main>
        </div>

        <footer>
            <div>
                <p>&copy; 2023 Receptionist Homepage. All rights reserved.</p>
            </div>
        </footer>
    </body>

</html>