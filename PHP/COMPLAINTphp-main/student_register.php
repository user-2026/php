<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST['student_id'];
    $password = $_POST['password'];
    // Add more fields as needed

    // Perform validation (you can add more validation as needed)

    // Check if the student ID is unique (not already registered)
    $check_sql = "SELECT * FROM complaint_students WHERE student_id = '$student_id'";
    $check_result = $conn->query($check_sql);

    if ($check_result !== false) {
        if ($check_result->num_rows > 0) {
            echo "Student ID is already registered. Please choose another ID.";
        } else {
            // Insert new student into the database
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $insert_sql = "INSERT INTO complaint_students (student_id, password) VALUES ('$student_id', '$hashed_password')";
            $insert_result = $conn->query($insert_sql);

            if ($insert_result !== false) {
                echo "<script>alert('Student registered successfully!'); window.location='index.php';</script>";
                exit();
            } else {
                echo "Error: " . $insert_sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "Error: " . $check_sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h2>Student Registration</h2>
    <form method="post" action="">
        <label for="student_id">Student ID:</label>
        <input type="text" name="student_id" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <br>
        <!-- Add more fields as needed for student registration -->
        <button type="submit">Register</button>
    </form>
</body>
</html>
