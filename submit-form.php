<?php
require "connect.php";

// Initialize errors array
$errors = [];

// Validation rules and error messages
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

// Handle signup form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["signup"])) {

    // Perform input validation
    foreach ($validationRules as $field => $message) {
        $value = trim($_POST[$field] ?? "");
        if (empty($value)) {
            $errors[$field] = $message;
        }
    }

    $fname = trim($_POST['fname'] ?? '');
    if (!preg_match('/^[a-zA-Z]+$/', $fname)) {
        $errors['fname'] = 'First name must only contain letters.';
    }

    $lname = trim($_POST['lname'] ?? '');
    if (!preg_match('/^[a-zA-Z]+$/', $fname)) {
        $errors['lname'] = 'Last name must only contain letters.';
    }

    $uname = trim($_POST['uname'] ?? '');
    if (!preg_match('/^[a-zA-Z]+$/', $fname)) {
        $errors['uname'] = 'First name must only contain letters.';
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

    echo "<script>";
    foreach ($errors as $field => $message) {
        $fieldId = $field . "-error";
        echo "document.getElementById('$fieldId').textContent = '$message';";
    }
    echo "</script>";

    // Proceed if there are no input validation errors
    if (empty($errors)) {
        // Check if username already exists
        $sql = "SELECT user_name FROM users WHERE user_name=?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, 's', $_POST['uname']);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            if (mysqli_stmt_num_rows($stmt) > 0) {
                $errors['uname'] = 'Username already exists.';
            } else {
                // Insert user data into users table
                $sql = 'INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number, Role) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
                if ($stmt = mysqli_prepare($conn, $sql)) {
                    $role = !empty($_POST['department']) ? 'doctor' : 'receptionist';
                    mysqli_stmt_bind_param(
                        $stmt,
                        'sssssssssss',
                        $_POST['fname'],
                        $_POST['lname'],
                        $_POST['uname'],
                        $_POST['email'],
                        password_hash($_POST['password'], PASSWORD_DEFAULT),
                        password_hash($_POST['password'], PASSWORD_DEFAULT),
                        $_POST['dob'],
                        $_POST['gender'],
                        $_POST['address'],
                        $_POST['phone'],
                        $role
                    );
                    if (mysqli_stmt_execute($stmt)) {
                        header('Location: index.html');
                        exit;
                    } else {
                        $errors[] = 'An error occurred. Please try again later.';
                    }
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }
}
