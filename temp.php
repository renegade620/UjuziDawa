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
            $role = !empty($_POST["department"]) ? "doctor" : "user";

            $stmt->bind_param("sssssssssss", $_POST["fname"], $_POST["lname"], $_POST["uname"], $_POST["email"], $hashed_password, $hashed_password, $_POST["dob"], $_POST["gender"], $_POST["address"], $_POST["phone"], $role);
            if ($stmt->execute()) {
                $userID = $stmt->insert_id;

                // Insert doctor data if department is specified
                if (!empty($_POST["department"])) {
                    $dep_query = "SELECT department_id FROM department WHERE dept_name = ?";
                    $stmt2 = $conn->prepare($dep_query);
                    $stmt2->bind_param("s", $_POST["department"]);
                    $stmt2->execute();
                    $stmt2->bind_result($departmentID);
                    $stmt2->fetch();
                    $stmt2->close();

                    $sql2 = "INSERT INTO doctor (user_id, first_name, last_name, dept_id, department) 
                             VALUES (?, ?, ?, ?, ?)";
                    $stmt3 = $conn->prepare($sql2);
                    $stmt3->bind_param("issis", $userID, $_POST["fname"], $_POST["lname"], $departmentID, $_POST["department"]);
                    $stmt3->execute();
                    $stmt3->close();
                }

                // Redirect to the success page
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
?>













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
    $department = trim($_POST["department"]);

    // Input Validation
    $errors = [];
    if (empty($fname)) {
        $errors["fname"] = "First name is required.";
    }
    if (empty($lname)) {
        $errors["lname"] = "Last name is required.";
    }

    if (empty($uname)) {
        $errors["uname"] = "Username is required.";
    }

    if (empty($email)) {
        $errors["email"] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors["password"] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors["password"] = "Password must be at least 8 characters long.";
    }

    if ($password !== $confirm_password) {
        $errors["confirm_password"] = "Passwords do not match.";
    }

    if (empty($dob)) {
        $errors["dob"] = "Pick date.";
    }

    if (empty($gender)) {
        $errors["gender"] = "Pick gender.";
    }

    if (empty($address)) {
        $errors["address"] = "Address is required.";
    }

    if (empty($phone)) {
        $errors["phone"] = "Phone Number is required.";
    }

    if (empty($errors)) {
        $sql = "SELECT user_name FROM users WHERE user_name=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $errors["uname"] = "Username already exists";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                $errors["uname"] = "Username already exists";
            } else {
                $sql = "INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number, Role) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $errors[] = "Sign up again!";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $hashed_pwd = password_hash($confirm_password, PASSWORD_DEFAULT);
                    $role = 'user';

                    if (!empty($department)) {
                        $role = 'doctor';
                    }

                    mysqli_stmt_bind_param($stmt, "sssssssssss", $fname, $lname, $uname, $email, $hashed_password, $hashed_pwd, $dob, $gender, $address, $phone, $role);
                    if (mysqli_stmt_execute($stmt)) {
                        // Retrieve the auto-generated user_id
                        $userID = mysqli_insert_id($conn);

                        $departmentID = "";
                        if (!empty($department)) {
                            $dep_query = "SELECT department_id FROM department WHERE dept_name = ?";
                            $stmt2 = mysqli_stmt_init($conn);
                            if (mysqli_stmt_prepare($stmt2, $dep_query)) {
                                mysqli_stmt_bind_param($stmt2, "s", $department);
                                mysqli_stmt_execute($stmt2);
                                mysqli_stmt_bind_result($stmt2, $departmentID);
                                mysqli_stmt_fetch($stmt2);
                               ;
                            } else {
                                error_log("Error: " . mysqli_error($conn));
                                $errors[] = "An error occurred. Please try again later.";
                            }
                            mysqli_stmt_close($stmt2);
                        }

                        if (!empty($department)) {
                            $sql2 = "INSERT INTO doctor (user_id, first_name, last_name, dept_id, department) 
                                    VALUES (?, ?, ?, ?, ?)";
                            $stmt3 = mysqli_stmt_init($conn);
                            if (mysqli_stmt_prepare($stmt3, $sql2)) {
                                mysqli_stmt_bind_param($stmt3, "issis", $userID, $fname, $lname, $departmentID, $department);
                                mysqli_stmt_execute($stmt3);
                            } else {
                                error_log("Error: " . mysqli_error($conn));
                                $errors[] = "An error occurred. Please try again later.";
                            }
                            mysqli_stmt_close($stmt3);
                        }

                        // Redirect to a success page or appropriate location
                        // Redirect to the index.html page with the login modal opened
                        header("Location: index.html?login_modal=1");
                        exit;
                    } else {
                        error_log("Error: " . mysqli_error($conn));
                        $errors[] = "An error occurred. Please try again later.";
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>


<script>
    // Check if the login modal parameter is present in the URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has("login_modal")) {

        const modal = document.getElementById("login-modal");
        if (modal) {
            modal.style.display = "block";
        }
    }
</script>