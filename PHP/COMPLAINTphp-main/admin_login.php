<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: admin_page.php");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];

    // Perform validation (you can add more validation as needed)

    // Check if the admin credentials are valid
    $sql = "SELECT * FROM admins WHERE admin_username = '$admin_username' AND admin_password = '$admin_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Redirect to the admin page
        $_SESSION['admin_id'] = $admin_username;
        header("Location: admin_page.php");
        exit();
    } else {
        echo "Invalid admin credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h2>Admin Login</h2>
    <form method="post" action="">
        <label for="admin_username">Username:</label>
        <input type="text" name="admin_username" required>
        <br>
        <label for="admin_password">Password:</label>
        <input type="password" name="admin_password" required>
        <br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
