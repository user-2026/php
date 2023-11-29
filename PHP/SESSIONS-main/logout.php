<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["username"])) {
    header("Location: index.php");
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

// Function to update login count
function updateLoginCount($conn, $username) {
    $sql = "UPDATE session_users SET logins = logins - 1 WHERE username = '$username' AND logins > 0";
    $conn->query($sql);
}

// Update login count and destroy the session
updateLoginCount($conn, $_SESSION["username"]);
session_unset();
session_destroy();

header("Location: index.php");
exit();
?>
