<?php

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
                $passwordCheck = password_verify($pwd, $row['password']);

                if ($passwordCheck == false) {
                    header("location: index.html?error=wrongpassword");
                    exit();
                } elseif ($passwordCheck == true) {
                    session_start();
                    $_SESSION['userid'] = $row['user_id'];
                    $_SESSION['username'] = $row['user_name'];

                    if ($row['Role'] == 'admin') {
                        header("location: admin.php?login=success");
                    } else if ($row['Role'] == 'doctor') {
                        header("location: doctors.php?login=success");
                    } else if ($row['Role'] == 'reception') {
                        header("location: reception.php?login=success");
                    } else {
                        header("location: dashboard5.php?login=success");
                    }
                } else {
                    header("location: index.html?error=wrongpassword");
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
