<!DOCTYPE html>
<html>

<head>
    <title>Diseases</title>
    <style>
        body {
            font-family: Verdana, Tahoma, sans-serif;
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
    $query = "SELECT * FROM description";
    $result = mysqli_query($conn, $query);

    ?>

    <h1>Diseases</h1>

    <div class="disease-list">
        <?php
        // Display the diseases and descriptions
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="disease-item">';
            echo '<h2>' . $row["disease"] . '</h2>';
            echo '<p>' . $row["definition"] . '</p>';
            echo '</div>';
        }
        ?>
    </div>

    <div class="add-disease-form">
        <h2>Add Disease</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="text" name="disease_name" placeholder="Disease Name" required>
            <textarea name="disease_description" placeholder="Description" required></textarea>
            <button type="submit">Add Disease</button>
        </form>
    </div>

    <?php
    $conn->close();
    ?>
</body>

</html>