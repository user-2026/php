<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farming System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Welcome to the Farming System</h1>

    <?php
    if (isset($_SESSION['user_id'])) {
        // Display welcome message and username after login
        echo "<p>Welcome, {$_SESSION['username']}!</p>";

        if ($_SESSION['type'] === 'farmer') {
            echo "<p>You are a farmer. Redirecting to products page...</p>";
            header("Refresh: 2; URL=products.php"); // Redirect after 2 seconds
            exit();
        }

        // Display "Browse Products" option only for buyers
        if ($_SESSION['type'] === 'buyer') {
            echo "<ul>";
            echo "<li><a href='products.php'>Browse Products</a></li>";
            echo "</ul>";
        }

        // Add additional content for logged-in users

        echo "<p><a href='logout.php'>Logout</a></p>";
    } else {
        // Display content for users who are not logged in
        echo "<p>Please <a href='login.php'>login</a> or <a href='register.php'>register</a>.</p>";
    }
    ?>
</body>
</html>
