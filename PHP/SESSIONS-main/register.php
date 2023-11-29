<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION["username"])) {
    header("Location: welcome.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sessions";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to hash the password
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Function to register a new user
function registerUser($conn, $username, $password) {
    $hashedPassword = hashPassword($password);
    $sql = "INSERT INTO session_users (username, password) VALUES ('$username', '$hashedPassword')";
    
    if ($conn->query($sql) === TRUE) {
        echo '<script>alert("Registration successful!"); window.location.href = "index.php";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Register the user
    registerUser($conn, $username, $password);
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Register</h1>
        <form action="register.php" method="post">
            <label for="reg_username">Username:</label>
            <input type="text" id="reg_username" name="username" required>
            <br>
            <label for="reg_password">Password:</label>
            <input type="password" id="reg_password" name="password" required>
            <br>
            <input type="submit" value="Register">
        </form>
        <p>Already have an account? <a href="index.php">Login</a></p>
    </div>
</body>
</html>
