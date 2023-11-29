<?php
// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $type = $_POST['type']; // 'farmer' or 'buyer'

    $sql = "INSERT INTO farmers (username, password, type) VALUES ('$username', '$password', '$type')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to login page after successful registration
        header("Location: login.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Registration</h2>
    
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" name="password" required>

        <label for="type">Account Type:</label>
        <select name="type">
            <option value="farmer">Farmer</option>
            <option value="buyer">Buyer</option>
        </select>

        <button type="submit">Register</button>
    </form>
</body>
</html>

