<!DOCTYPE html>
<html>

<head>

    <style>
        .more-info {
            display: none;
        }

        .more-info.hidden {
            display: table-row;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        th {
            background-color: #487cff;
            color: white;
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
        <a href="doctor.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    require "connect.php";

    $sql = "SELECT patient.health_number, patient.patient_name, diagnosis.symptoms, diagnosis.diseases FROM patient INNER JOIN diagnosis ON patient.health_number = diagnosis.health_number";
    $result = $conn->query($sql);

    // Display the data in a table
    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Health Number</th><th>Name</th><th>Symptoms</th><th>Diseases</th><th></th><th></th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["health_number"] . "</td>";
            echo "<td>" . $row["patient_name"] . "</td>";
            $symptoms = json_decode($row["symptoms"], true);
            echo "<td>" . implode(", ", $symptoms) . "</td>";
            $diseases = json_decode($row["diseases"], true);
            echo "<td>" . implode(", ", $diseases) . "</td>";
            echo "<td><button class='treat-button'>Treat</button></td>";
            echo "<td><button class='refer-button'>Refer</button></td>";


            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>

    <!-- Add treatment form to page -->
    <form id="treatment-form" class="form-container" style="display: none;" method="POST">
        <h2>Treatment Form</h2>
        <label for="health-number">Health Number:</label>
        <input type="text" id="health-number" name="health-number" required><br><br>
        <label for="disease-treated">Disease Treated:</label>
        <input type="text" id="disease-treated" name="disease-treated" required><br><br>
        <label for="prescription">Prescription:</label>
        <textarea id="prescription" name="prescription" required></textarea><br><br>
        <input type="submit" value="Submit">

        <?php
        // Check if form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $healthNumber = $_POST["health-number"];
            $diseaseTreated = $_POST["disease-treated"];
            $prescription = $_POST["prescription"];

            // Validate form data
            if (empty($healthNumber) || empty($diseaseTreated) || empty($prescription)) {
                echo "Fill empty fields!";
            } else {
                require "connect.php";

                $stmt = $conn->prepare("INSERT INTO treatments (health_number, disease_treated, prescription) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $healthNumber, $diseaseTreated, $prescription);

                // Execute statement
                if ($stmt->execute()) {
                    echo "Patient Successfully Treated!";
                } else {
                    echo "Patient not Treated!";
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();
            }
        }
        ?>
    </form>

    <!-- Add referral form to page -->
    <form id="referral-form" class="form-container" style="display: none;" method="POST">
        <h2>Referral Form</h2>
        <label for="health-number">Health Number:</label>
        <input type="text" id="health-number" name="health-number" required><br><br>
        <label for="department">Department:</label>
        <select id="department" name="department" required>
            <option value="">--Please choose an option--</option>
            <option value="Internal_Medicine">Internal Medicine</option>
            <option value="Infectious_Diseases">Infectious Diseases</option>
            <option value="Allergy_Immunology">Allergy & Immunology</option>
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
        <label for="referral-reason">Referral Reason:</label>
        <textarea id="referral-reason" name="referral-reason" required></textarea><br><br>
        <label for="referred-to">Referred To:</label>
        <select id="referred-to" name="referred-to" required></select><br><br>
        <input type="submit" value="Submit">

        <?php
        // Check if form was submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $healthNumber = $_POST["health-number"];
            $department = $_POST['department'];
            $referralReason = $_POST["referral-reason"];
            $referralPerson = $_POST["referral-to"];

            // Validate form data
            if (empty($healthNumber) || empty($referralReason) || empty($referralPerson)) {
                echo "Fill empty fields!";
            } else {
                require "connect.php";

                $stmt = $conn->prepare("INSERT INTO referrals (health_number, department, referral_reason, referral_person) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $healthNumber, $referralReason, $referralPerson);

                // Execute statement
                if ($stmt->execute()) {
                    echo "Patient Successfully Treated!";
                } else {
                    echo "Patient not Treated!";
                }

                // Close statement and connection
                $stmt->close();
                $conn->close();
            }
        }
        ?>
    </form>

    <script>
        // Get treatment form element
        var treatmentForm = document.getElementById('treatment-form');
        // Get all treat buttons
        var treatButtons = document.querySelectorAll('.treat-button');

        // Add event listener to each treat button
        treatButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                treatmentForm.style.display = 'block';
            });
        });

        // Get referral form element
        var referralForm = document.getElementById('referral-form');
        // Get all refer buttons
        var referButtons = document.querySelectorAll('.refer-button');
        // Get department select element
        var departmentSelect = document.getElementById('department');
        // Get referred-to select element
        var referredToSelect = document.getElementById('referred-to');

         // Define referred-to options for each department
    var referredToOptions = {
        Internal_Medicine: ['Dr. Daudi', 'Dr. Kibet'],
        Infectious_Diseases: ['Dr. Samawar', 'Dr. Patel'],
        Allergy_Immunology: ['Dr. Katana', 'Dr. Mungatana'],
        Cardiology: ['Dr. Saumu', 'Dr. Salim'],
        Dermatology: ['Dr. Saumu', 'Dr. Salim'],
        Orthopedics: ['Dr. Baraka', 'Dr. Adhiambo'],
        Gastroenterology: ['Dr. Osman', 'Dr. Awene'],
        ENT: ['Dr. Ali', 'Dr. Nyasuguta'],
        Surgery: ['Dr. Chirau', 'Dr. George'],
        Urology: ['Dr. Masoud', 'Dr. Kinoti'],
        Neurology: ['Dr. Carson', 'Dr. Hopkins'],
        Pulmonology: ['Dr. Amin', 'Dr. Loulou']
    };

    // Add event listener to department select change event
    departmentSelect.addEventListener('change', function() {
        // Get selected department
        var selectedDepartment = this.value;

        // Clear referred-to options
        referredToSelect.innerHTML = '';

        // Check if a department was selected
        if (selectedDepartment) {
            // Get referred-to options for selected department
            var options = referredToOptions[selectedDepartment];

            // Create and append new referred-to options
            options.forEach(function(option) {
                var optionElement = document.createElement('option');
                optionElement.value = option;
                optionElement.textContent = option;
                referredToSelect.appendChild(optionElement);
            });
        }
    });

        // Add event listener to each refer button
        referButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                referralForm.style.display = 'block';
            });
        });
    </script>

</body>

</html>