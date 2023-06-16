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
} else {
    echo '<p style="color:green">';
    echo "Connected successful!";
    echo '</p>';
}

$query = "SELECT symptom, weigh FROM severity";

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sym = $row['symptom'];
        $sev = $row['weigh'];
        echo $sym . " - " .$sev . "</br>";
    }
}

