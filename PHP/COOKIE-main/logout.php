<?php
session_start();
include 'process.php';

if (isset($_SESSION['username'])) {
    // Remove the cookie when the user logs out
    setcookie('username', '', time() - 3600, '/');
    session_destroy();
    unset($_SESSION['username']);
}

header('location:index.php');
?>
