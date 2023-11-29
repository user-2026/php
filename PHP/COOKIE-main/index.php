<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Login System</h1>
    </div>
    <?php
    if (isset($_SESSION['username'])) {
        echo "<div class='form-container'>
                <p class='welcome'>Welcome, " . $_SESSION['username'] . "! <a href='logout.php' class='link'>Logout</a></p>
            </div>";
    } else {
        ?>
        <div class="form-container">
            <h2>Login Form</h2>
            <form action="process.php" method="post">
                <label for="username">Username:</label>
                <input type="text" name="username" required>

                <label for="password">Password:</label>
                <input type="password" name="password" required>

                <div class="btn-container">
            <button type="submit" name="login" class="btn">Login</button>
              </div>

                <p>Don't have an account? <a href="register.php" class="link">Register here</a></p>
            </form>
        </div>
        <?php
    }
    ?>
</div>

</body>
</html>
