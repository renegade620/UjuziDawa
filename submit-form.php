<?php
require "connect.php";

// Initialize errors array
$errors = [];

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {
    // Define input validation rules and error messages
    $validationRules = [
        "fname" => "First name is required.",
        "lname" => "Last name is required.",
        "uname" => "Username is required.",
        "email" => "Email is required.",
        "password" => "Password is required.",
        "confirm-password" => "Passwords do not match.",
        "dob" => "Pick date.",
        "gender" => "Pick gender.",
        "address" => "Address is required.",
        "phone" => "Phone Number is required."
    ];

    // Perform input validation
    foreach ($validationRules as $field => $message) {
        $value = trim($_POST[$field] ?? "");
        if (empty($value)) {
            $errors[$field] = $message;
        }
    }

    $email = trim($_POST["email"] ?? "");
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    $password = trim($_POST["password"] ?? "");
    if (strlen($password) < 8) {
        $errors["password"] = "Password must be at least 8 characters long.";
    }

    $confirm_password = trim($_POST["confirm-password"] ?? "");
    if ($password !== $confirm_password) {
        $errors["confirm-password"] = "Passwords do not match.";
    }

    // Proceed if there are no input validation errors
    if (empty($errors)) {
        // Check if username already exists
        $sql = "SELECT user_name FROM users WHERE user_name=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $_POST["uname"]);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $errors["uname"] = "Username already exists.";
        } else {
            // Insert user data into users table
            $sql = "INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number, Role) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $role = !empty($_POST["department"]) ? "doctor" : "reception";

            $stmt->bind_param("sssssssssss", $_POST["fname"], $_POST["lname"], $_POST["uname"], $_POST["email"], $hashed_password, $hashed_password, $_POST["dob"], $_POST["gender"], $_POST["address"], $_POST["phone"], $role);
            if ($stmt->execute()) {
                $userID = $stmt->insert_id;

                // Insert doctor data if department is specified
                if (!empty($_POST["department"])) {
                    $department = $_POST["department"];
                    $dep_query = "SELECT dept_id FROM department WHERE dept_name = ?";
                    $stmt2 = $conn->prepare($dep_query);
                    // Check for errors in preparing the statement
                    if ($stmt2 === false) {
                        die("Error preparing statement: " . $conn->error);
                    } else {
                        $stmt2->bind_param("s", $department);
                        $stmt2->execute();
                        $dep_result = $stmt2->get_result();
                        $drow = $dep_result->fetch_assoc();
                        $departmentID = $drow["dept_id"];
                        echo "Hello" . "<br>";
                        echo $departmentID . "<br>";
                        $stmt2->close();

                        $sql2 = "INSERT INTO doctor (user_id, first_name, last_name, dept_id, department, shift_start, shift_end) 
                             VALUES (?, ?, ?, ?, ?, '00:00:00', '00:00:00')";
                        $stmt3 = $conn->prepare($sql2);
                        echo $userID . "<br>";
                        echo $_POST["fname"] . "<br>";
                        echo $_POST["lname"] . "<br>";
                        echo $departmentID . "<br>";
                        echo $department . "<br>";

                        // Check for errors in preparing the statement
                        if ($stmt3 === false) {
                            die("Error preparing statement: " . $conn->error);
                        } else {
                            $stmt3->bind_param("issis", $userID, $_POST["fname"], $_POST["lname"], $departmentID, $department);
                            if (!$stmt3->execute()) {
                                $errors[] = "Error executing the doctor insertion query: " . $stmt3->error;

                                echo $errors[count($errors) - 1];
                            }
                            $stmt3->close();
                        }
                    }
                }
                header("Location: index.html?login_modal=1");
                exit;
            } else {
                $errors[] = "An error occurred. Please try again later.";
            }
        }
        $stmt->close();
    }

    mysqli_close($conn);
}
