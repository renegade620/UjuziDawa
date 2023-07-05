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
                $sql = "INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $errors[] = "Sign up again!";
                } else {
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $hashed_pwd = password_hash($confirm_password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "ssssssssss", $fname, $lname, $uname, $email, $hashed_password, $hashed_pwd, $dob, $gender, $address, $phone);
                    if (mysqli_stmt_execute($stmt)) {
                        // Retrieve the auto-generated user_id
                        $userID = mysqli_insert_id($conn);

                        // Redirect to a success page or appropriate location
                        // Redirect to the index.html page with the login modal opened
                        header("Location: index.html?login_modal=1");
                        exit;
                    } else {
                        // Handle database error for users table insertion
                        echo "Error: " . mysqli_error($conn);
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


if (mysqli_stmt_execute($stmt)) {
                        // Retrieve the auto-generated user_id
                        $userID = mysqli_insert_id($conn);

                        // Insert doctor into the doctor table
                        if (!empty($department)) {
                            $sql = "INSERT INTO doctor (user_id, first_name, last_name, department) 
                                    VALUES (?, ?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (mysqli_stmt_prepare($stmt, $sql)) {
                                mysqli_stmt_bind_param($stmt, "isss", $userID, $fname, $lname, $department);
                                mysqli_stmt_execute($stmt);
                            } else {
                                // Handle database error for inserting doctor
                                echo "Error: " . mysqli_error($conn);
                            }
                        }

                        // Redirect to a success page or appropriate location
                        // Redirect to the index.html page with the login modal opened
                        header("Location: index.html?login_modal=1");
                        exit;
                    } else {
                        // Handle database error for users table insertion
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
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
    $department = trim($_POST["department"]); // Added department field

    // Input Validation
    $errors = [];
    // ... (existing input validation code)

    if (empty($department)) {
        $errors["department"] = "Department is required.";
        exit();
    }

    if (empty($errors)) {
        // Check if username already exists
        $sql = "SELECT user_name FROM users WHERE user_name=?";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            $errors["uname"] = "Username already exists.";
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if ($resultCheck > 0) {
                $errors["uname"] = "Username already exists.";
                exit();
            } else {
                // Insert user into the users table
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $hashed_pwd = password_hash($confirm_password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO users (first_name, last_name, user_name, email, password, confirm_password, dob, gender, address, phone_number) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    $errors[] = "Sign up failed!";
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssssssss", $fname, $lname, $uname, $email, $hashed_password, $hashed_pwd, $dob, $gender, $address, $phone);
                    mysqli_stmt_execute($stmt);

                    // Retrieve the auto-generated user_id
                    $userID = mysqli_insert_id($conn);

                    // Insert doctor into the doctor table
                    $sql = "INSERT INTO doctor (user_id, first_name, last_name, department) 
                            VALUES (?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if (mysqli_stmt_prepare($stmt, $sql)) {
                        mysqli_stmt_bind_param($stmt, "isss", $userID, $fname, $lname, $department);
                        mysqli_stmt_execute($stmt);
                    } else {
                        // Handle database error for inserting doctor
                        echo "Error: " . mysqli_error($conn);
                    }

                    header("Location: index.html#login-modal");
                    exit();
                }
            }
        }
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
