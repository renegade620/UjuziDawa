<?php
// session_start();

// require "connect.php";

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["time-slot"])) {
//     $doctor_id = intval($_SESSION['userid']);
//     $shift_start = $_POST["shift-start"];

//     // Calculate shift end time
//     $shift_end = date('H:i:s', strtotime($shift_start) + 8 * 60 * 60);

//     // Update the doctor's shift start and end times in the database
//     $sql = "UPDATE doctor SET shift_start = '$shift_start', shift_end = '$shift_end' WHERE doctor_id = '$doctor_id'";
//     $stmt = $conn->query($sql);

//     if ($stmt === true) {
//         // Query executed successfully
//         echo "Shift times saved successfully.";
//     } else {
//         // Error executing query
//         echo "Error updating shift times: " . $conn->error;
//     }
// }

// Redirect back to doctors.php
// header("Location: doctors.php");
// exit;


// session_start();

// require "connect.php";

// // Check if the form is submitted
// if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["time-slot"])) {
//     $doctor_id = intval($_SESSION['userid']);
//     $shift_start = $_POST["shift-start"];

//     // Calculate shift end time
//     $shift_end = date('H:i:s', strtotime($shift_start) + 8 * 60 * 60);

//     // Update the doctor's shift start and end times in the database
//     $sql = "UPDATE doctor SET shift_start = '$shift_start', shift_end = '$shift_end' WHERE doctor_id = '$doctor_id'";
//     $stmt = $conn->prepare($sql);
//     $stmt->execute();

//     if ($stmt->affected_rows > 0) {
//         // Query executed successfully
//         echo "successfully.";
//     } else {
//         // Error executing query
//         echo "Error updating shift times: " . $conn->error;
//     }
// }

// Redirect back to doctors.php
// header("Location: doctors.php");
// exit;

require "docsession.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["time-slot"])) {
    $doctor_id = $_SESSION['userid'];
    $shift_start = $_POST["shift-start"];

    // Calculate shift end time
    $shift_end = date('H:i:s', strtotime($shift_start) + 8 * 60 * 60);

    // Prepare and execute the update statement
    $sql = "UPDATE doctor SET shift_start = ?, shift_end = ? WHERE doctor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssi", $shift_start, $shift_end, $doctor_id);

    if ($stmt->execute()) {
        // Check the number of affected rows
        $affected_rows = $stmt->affected_rows;

        if ($affected_rows > 0) {
            // Rows updated successfully
            echo "Shift times updated successfully. Affected rows: " . $affected_rows;
        } else {
            // No rows were updated
            echo "No rows were updated.";
        }
    } else {
        // Error executing query
        echo "Error updating shift times: " . $stmt->error;
    }

    $stmt->close();
}

header("Location: doctors.php");
exit;
?>
