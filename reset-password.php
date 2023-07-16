<?php

require "connect.php";

// Check if a token was provided in the URL
if (isset($_GET['token'])) {
    // Get the token from the URL
    $token = $_GET['token'];

    // Verify that the token is valid
    if (verifyToken($conn, $token)) {
        // Check if the form has been submitted
        if (isset($_POST['password']) && isset($_POST['confirm_password'])) {
            // Get the new password and its confirmation from the form
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            // Check if the new password and its confirmation match
            if ($password === $confirmPassword) {
                // Update the user's account with the new password
                updateUserPassword($conn, $token, $password);

                // Invalidate the token
                invalidateToken($conn, $token);

                // Redirect to a page that confirms that the password has been successfully reset
                header("Location: password-reset-success.php");
                exit();
            }
        }
    }
}

// Function to verify that a token is valid
function verifyToken($conn, $token)
{
    // Prepare a SELECT statement to check if the token exists in the password_resets table and has not expired
    $stmt = $conn->prepare("SELECT email FROM password_resets WHERE token = ? AND expires_at > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

// Function to update a user's password
function updateUserPassword($conn, $token, $password)
{
    // Hash the new password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare an UPDATE statement to update the user's password in the users table
    $stmt = $conn->prepare("UPDATE users INNER JOIN password_resets ON users.email = password_resets.email SET users.password = ? WHERE password_resets.token = ?");
    $stmt->bind_param("ss", $hashedPassword, $token);
    $stmt->execute();
}

// Function to invalidate a token
function invalidateToken($conn, $token)
{
    // Prepare a DELETE statement to remove the token from the password_resets table
    $stmt = $conn->prepare("DELETE FROM password_resets WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/home.css" />
    <title>UjuziDawa || Medical Diagnosis System</title>
</head>

<body>
    <form method="post">
        <label for="password">New Password:</label>
        <input type="password" name="password" id="password" required>
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <input type="submit" value="Submit">
    </form>
</body>

</html>