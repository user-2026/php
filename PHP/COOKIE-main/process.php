<?php
session_start();
include 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM cookie_users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header('location:index.php');
    } else {
        echo "Incorrect username or password";
    }
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO cookie_users (username, password) VALUES ('$username', '$password')";
    mysqli_query($conn, $query);

    // Set a cookie to remember the user for 1 hour after registration
    setcookie('username', $username, time() + 3600, '/');

    header('location:index.php');
}

if (isset($_GET['logout'])) {
    // Remove the cookie when the user logs out
    setcookie('username', '', time() - 3600, '/');
    session_destroy();
    unset($_SESSION['username']);
    header('location:index.php');
}

mysqli_close($conn);
?>
