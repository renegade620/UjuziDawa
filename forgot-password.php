<?php
require "connect.php";

function emailExistsInDatabase($conn, $email) {
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

function storeTokenInDatabase($conn, $email, $token) {
    // Prepare an INSERT statement to store the token in the password_resets table
    $stmt = $conn->prepare("INSERT INTO password_resets (email, token) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $token);
    $stmt->execute();
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    if (emailExistsInDatabase($conn, $email)) {
        $token = bin2hex(random_bytes(16));

        storeTokenInDatabase($conn, $email, $token);

        // Send an email to the user with a password reset link that includes the token as a parameter
        $resetLink = "http://localhost/reset-password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Please click on the following link to reset your password: $resetLink";
        mail($email, $subject, $message);
    }
}




