<?php

    // establish database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ujuzidawa";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // retrieve selected disease from the AJAX request
    if (isset($_POST['disease'])) {
        $selected_disease = $_POST['disease'];

        $query = "SELECT * FROM description WHERE name = '$selected_disease'";

        $result = $conn->query($query);

        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "Extra info about " . $selected_disease . ":<br>";
                echo "- Description: " . $row['description'] . ":<br>";
            } 
        }else {
                echo "No extra info found";
            }
        } else {
            echo "No disease selected!";
        }
    