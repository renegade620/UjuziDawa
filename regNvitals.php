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
        <a href="nurse.php" class="back-button">Back to Dashboard</a>
    </div>
    <?php
    require "connect.php";

    $sql = "SELECT *, TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) AS age FROM patient";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<h3>Registered Patient</h3>";
        echo "<table>";
        echo "<tr><th>Health Number</th><th>Patient Name</th><th>Gender</th><th>Age</th><th>Phone Number</th><th>Email</th><th>Reason for registration</th><th>More Info</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["health_number"] . "</td>";
            echo "<td>" . $row["patient_name"] . "</td>";
            echo "<td>" . $row["gender"] . "</td>";
            echo "<td>" . $row["age"] . "</td>";
            echo "<td>" . $row["phone_number"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["reason_for_registration"] . "</td>";
            echo "<td><button class='toggle'>Show More</button></td>";
            echo "</tr>";
            echo "<tr class='more-info'>";
            echo "<td colspan='6'>";
            echo "<p>Address: " . $row["address"] . "</p>";
            echo "<p>Emergency Contact Person: " . $row["emergency_contact_name"] . "</p>";
            echo "<p>Emergency Contact Person: " . $row["emergency_contact_phone_number"] . "</p>";
            echo "<p>Marital Status: " . $row["marital_status"] . "</p>";
            // Add more columns here
            echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // No patient found
        echo "No patient found with health number: " . $healthNumber;
    }

    // Close the result and connection
    $result->close();
    $conn->close();
    ?>
</body>


<script>
    const toggleButtons = document.querySelectorAll('.toggle');
    toggleButtons.forEach(button => {
        button.addEventListener('click', event => {
            const moreInfoRow = event.target.closest('tr').nextElementSibling;
            moreInfoRow.classList.toggle('hidden');
            event.target.textContent = event.target.textContent === 'Show More' ? 'Show Less' : 'Show More';
        });
    });
</script>

</html>