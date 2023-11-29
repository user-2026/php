<?php
session_start();

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Admin login
        if ($username == 'admin' && $password == 'admin') {
            $_SESSION['admin_id'] = $username;
            header("Location: admin_page.php");
            exit();
        }

        // Student login
        $sql = "SELECT * FROM complaint_students WHERE student_id = '$username'";
        $result = $conn->query($sql);

        if ($result !== false) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['student_id'] = $username;
                    header("Location: student_complaint.php");
                    exit();
                } else {
                    echo "Invalid password. Please try again.";
                }
            } else {
                echo "Invalid student ID. Please try again.";
            }
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['register'])) {
        // Redirect to student registration page
        header("Location: student_register.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit" name="login">Login</button>
    </form>

    <!-- Student registration link -->
    <p>Don't have an account? <a href="student_register.php">Create one</a></p>
</body>
</html>
