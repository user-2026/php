<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <div class="header">
        <h1>Registration Form</h1>
    </div>
    <div class="form-container">
        <h2>Registration Form</h2>
        <form action="process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <div class="btn-container">
            <button type="submit" name="register" class="btn">Login</button>
              </div>
            <p>Already have an account? <a href="index.php" class="link">Login here</a></p>
        </form>
    </div>

</div>

</body>
</html>