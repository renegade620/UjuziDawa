<!DOCTYPE html>
<html>

<head>
    <title>Diseases</title>
    <style>
        body {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        h1 {
            color: #333;
        }

        .disease-list {
            margin-top: 20px;
        }

        .disease-item {
            margin-bottom: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }

        .add-disease-form {
            margin-top: 20px;
        }

        .add-disease-form input[type="text"],
        .add-disease-form textarea {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
        }

        .add-disease-form button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
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

        .more-info.hidden {
            display: none;
        }
    </style>
</head>

<body>
    <div class="back">
        <a href="admin.php" class="back-button">Back to Dashboard</a>
    </div>

    <?php
    include "connect.php";

    // Function to sanitize user input
    function sanitizeInput($input)
    {
        $input = trim($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Process the form submission to add a new disease
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $diseaseName = sanitizeInput($_POST["disease_name"]);
        $diseaseDescription = sanitizeInput($_POST["disease_description"]);

        // Insert the new disease into the database
        $insertQuery = "INSERT INTO description (disease, definition) VALUES ('$diseaseName', '$diseaseDescription')";
        mysqli_query($conn, $insertQuery);

        // Redirect back to diseases.php
        header("Location: diseases.php");
        exit();
    }

    // Retrieve the diseases and descriptions from the description table
    $query = "SELECT description.disease, description.definition, department.dept_name FROM description INNER JOIN department ON description.dept_id = department.dept_id";
    $result = mysqli_query($conn, $query);
    ?>

    <div class="disease-list">
        <?php
        if ($result->num_rows > 0) {
            echo "<h1>Diseases</h1>";
            echo "<table>";
            echo "<tr><th>Diseases</th><th>Department</th><th></th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo '<td>' . $row["disease"] . '</td>';
                echo '<td>' . $row["dept_name"] . '</td>';
                echo "<td><button class='toggle'>Show More</button></td>";
                echo "</tr>";
                echo "<tr class='more-info hidden'>";
                echo "<td colspan='6'>";
                echo '<p>' . $row["definition"] . '</p>';
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
        }
        $result->close();
        ?>
    </div>

    <div class="add-disease-form">
        <h2>Add Disease</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="disease_name" placeholder="Disease Name" required>
            <label for="department"></label>
            <select id="department" name="department">
                <option>Select Department</option>
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
            </select><br><br>
            <textarea name="disease_description" placeholder="Description" required></textarea>
            <button type="submit">Add Disease</button>
        </form>
    </div>

    <?php
    // Retrieve data from the description and department tables
    $query = "SELECT department.dept_name, COUNT(description.disease) as disease_count
              FROM description
              INNER JOIN department ON description.dept_id = department.dept_id
              GROUP BY department.dept_name";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die('Query Error: ' . mysqli_error($conn));
    }

    // Display the number of diseases by department
    echo "<h1>Number of Diseases by Department</h1>";
    echo "<ul>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<li>" . htmlspecialchars($row["dept_name"]) . ": " . htmlspecialchars($row["disease_count"]) . "</li>";
    }
    echo "</ul>";

    $conn->close();
    ?>

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
</body>

</html>