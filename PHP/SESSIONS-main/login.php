<?php
// Database connection (same as in register.php)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sessions";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to verify the password
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

// Function to handle user login
function loginUser($conn, $username, $password) {
    $sql = "SELECT id, password, logins FROM session_users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verify the password
        if (verifyPassword($password, $row["password"])) {
            // Check the number of logins
            if ($row["logins"] < 2) {
                // Increment the logins count
                $newLogins = $row["logins"] + 1;
                $updateSql = "UPDATE session_users SET logins = $newLogins WHERE id = " . $row["id"];
                $conn->query($updateSql);

                // Start the session or perform any other necessary actions
                session_start();
                $_SESSION["username"] = $username;
                
                header("Location: welcome.php");
                exit();
            } else {
                echo '<div class="error-message">OOPS !! Maximum concurrent sessions reached. Logout from one of your sessions to log in again.</div>';
            }
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "User not found.";
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Log in the user
    loginUser($conn, $username, $password);
}

$conn->close();
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
   
</body>
</html>
