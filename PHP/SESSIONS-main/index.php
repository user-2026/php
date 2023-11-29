<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    header("Location: welcome.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <label for="login_username">Username:</label>
            <input type="text" id="login_username" name="username" required>
            <br>
            <label for="login_password">Password:</label>
            <input type="password" id="login_password" name="password" required>
            <br>
            <input type="submit" value="Login">
        </form>
        <p>Don't have an account? <a href="register.php">Create one</a></p>
    </div>
</body>
</html>
