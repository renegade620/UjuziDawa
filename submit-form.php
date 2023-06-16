<?php
require "connect.php";

// handle signup form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["signup"])) {
    // get input values
    $fname = trim($_POST["fname"]);
    $lname = trim($_POST["lname"]);
    $uname = trim($_POST["uname"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm-password"]);
    $dob = trim($_POST["dob"]);
    $gender = trim($_POST["gender"]);
    $address = trim($_POST["address"]);
    $phone = trim($_POST["phone"]);

    // Input Validation
    $errors = [];
    if (empty($fname)) {
        $errors["fname"] = "First name is required.";
        exit();
    }
    if (empty($lname)) {
        $errors["lname"] = "Last name is required.";
        exit();
    }
    if (empty($uname)) {
        $errors["uname"] = "Username is required.";
        exit();
    }
    if (empty($email)) {
        $errors["email"] = "Email is required.";
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
        exit();
    }
    if (empty($password)) {
        $errors["password"] = "Password is required.";
        exit();
    } elseif (strlen($password) < 8) {
        $errors["password"] = "Password must be at least 8 characters long.";
        exit();
    }
    if ($password !== $confirm_password) {
        $errors["confirm_password"] = "Passwords do not match.";
        exit();
    }
    if (empty($dob)) {
        $errors["dob"] = "Pick date.";
        exit();
    }
    if (empty($gender)) {
        $errors["gender"] = "Pick gender.";
        exit();
    }
    if (empty($address)) {
        $errors["address"] = "Address is required.";
        exit();
    }
    if (empty($phone)) {
        $errors["phone"] = "Phone Number is required.";
        exit();
    } else {
        $sql = "SELECT user_name FROM users WHERE user_name=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $errors["uname"] = "Username already exists";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                $errors["uname"] = "Username already exists";
                exit();
            } else {
                $sql = "INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $errors[] = "Sign up again!";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $hashed_pwd = password_hash($confirm_password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssssssss", $fname, $lname, $uname, $email, $hashed_password, $hashed_pwd, $dob, $gender, $address, $phone);
                    mysqli_stmt_execute($stmt);
                    header("Location: index.html#login-modal");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
