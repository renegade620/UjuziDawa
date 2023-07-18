<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    require 'connect.php';

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        header('Location: index.html?error=emptyfields');
        exit;
    }

    $sql = 'SELECT * FROM users WHERE user_name=?';
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['userid'] = $row['user_id'];
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['role'] = $row['Role'];

            switch ($row['Role']) {
                case 'admin':
                    header('Location: admin.php?login=success');
                    break;
                case 'doctor':
                    $_SESSION['userid'] = $row['doctor_id'];
                    header('Location: doctor.php?login=success');
                    break;
                case 'receptionist':
                    header('Location: receptionist.php?login=success');
                    break;
                case 'nurse':
                    header('Location: nurse.php?login=success');
                    break;
            }
        } else {
            header('Location: login.html?error=wrongpassword');
        }
    } else {
        header('Location: index.html?error=nouser');
        exit;
    }
} else {
    header('Location: index.html');
    exit;
}
