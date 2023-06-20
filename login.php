<?php

// // LOGIN
// require "connect.php";

// // handle login form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {
//     // get input values
//     $uname = trim($_POST["username"]);
//     $pwd = trim($_POST["password"]);

//     // Input Validation
//     $errors = [];
//     if (empty($uname)) {
//         $errors["username"] = "Username is required.";
//     }
//     if (empty($pwd)) {
//         $errors["password"] = "Password is required.";
//     }

//     // If there are no errors, proceed with login
//     if (empty($errors)) {
//         $sql = "SELECT * FROM users WHERE user_name = ?";
//         $stmt = mysqli_stmt_init($conn);
//         if (mysqli_stmt_prepare($stmt, $sql)) {
//             mysqli_stmt_bind_param($stmt, "s", $uname);
//             mysqli_stmt_execute($stmt);
//             $result = mysqli_stmt_get_result($stmt);

//             if (mysqli_num_rows($result) == 1) {
//                 $row = mysqli_fetch_assoc($result);
//                 $hashed_password = $row['password'];

//                 if (password_verify($pwd, $hashed_password)) {
//                     // Login successful                   
//                     $_SESSION['user_id'] = $row['user_id'];
//                     $_SESSION['username'] = $row['user_name'];
//                     echo "Login successful!";
//                     header("Location: ");
//                     exit();
//                 } else {
//                     $errors["login"] = "Invalid username or password.";
//                 }
//             } else {
//                 $errors["login"] = "Invalid username or password.";
//             }
//         } else {
//             $errors[] = "An error occurred. Please try again.";
//         }
//     }

//     mysqli_stmt_close($stmt);
//     mysqli_close($conn);
// }

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["login"])) {

    require "connect.php";

    $uname = trim($_POST["username"]);
    $pwd = trim($_POST["password"]);

    if (empty($uname) || empty($pwd)) {
        header("location: index.html?error=emptyfields");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE user_name=?";

        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: index.html?error=statementfailed");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $uname);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $row['password'] = password_hash($pwd, PASSWORD_DEFAULT);
                $hashed_password = $row['password'];
                $passwordCheck = password_verify($pwd, $hashed_password);

                if ($passwordCheck == false) {
                    header("location: index.html?error=wrongpassword");
                    exit();
                } elseif ($passwordCheck == true) {
                    if ($row['Role'] == 'admin') {
                        session_start();
                        $_SESSION['username'] = $row['user_name'];
                        header("location: admin.php?login=success");
                        exit();
                    } else {
                        session_start();
                        $_SESSION['username'] = $row['user_name'];

                        header("location: dashboard5.php?login=success");
                        exit();
                    }
                } else {
                    header("location: index.html?error=wrongpassword");
                    exit();
                }
            } else {
                header("location: index.html?error=nouser");
                exit();
            }
        }
    }
} else {
    header("location: index.html");
    exit();
}
