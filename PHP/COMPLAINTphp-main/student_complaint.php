<?php
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $complaint_text = $_POST['complaint_text'];
    $student_id = $_SESSION['student_id'];

    // Perform validation (you can add more validation as needed)

    // Insert complaint into the database
    $sql = "INSERT INTO complaints (student_id, complaint_text) VALUES ('$student_id', '$complaint_text')";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script>alert('Complaint submitted successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Complaint</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h2>Student Complaint</h2>
    <form method="post" action="">
        <label for="complaint_text">Complaint:</label>
        <textarea name="complaint_text" required></textarea>
        <br>
        <button type="submit">Submit Complaint</button>
    </form>

    <!-- Logout button -->
    <a href="logout.php">Logout</a>
</body>
</html>
