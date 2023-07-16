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
    <form id="treatment-form" style="display: none;">
        <h2>Treatment Form</h2>
        <label for="health-number">Health Number:</label>
        <input type="text" id="health-number" name="health-number" required><br><br>
        <label for="disease-treated">Disease Treated:</label>
        <input type="text" id="disease-treated" name="disease-treated" required><br><br>
        <label for="prescription">Prescription:</label>
        <textarea id="prescription" name="prescription" required></textarea><br><br>
        <input type="submit" value="Submit">
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

        // Add event listener to treatment form submit event
        treatmentForm.addEventListener('submit', function(event) {
            // Prevent default form submission behavior
            event.preventDefault();

            // Get form field values
            var healthNumber = document.getElementById('health-number').value;
            var diseaseTreated = document.getElementById('disease-treated').value;
            var prescription = document.getElementById('prescription').value;

            // TODO: Send form data to server for processing
            

            // Hide treatment form
            treatmentForm.style.display = 'none';
        });

        // Get all refer buttons
        var referButtons = document.querySelectorAll('.refer-button');

        // Add event listener to each refer button
        referButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                // Display referral form
                // ...
            });
        });
    </script>
</body>

</html>