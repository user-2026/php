<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: index.php");
    exit();
}

include('db.php');

// Fetch all complaints
$sql = "SELECT * FROM complaints";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" type="text/css" href="styles.css">

</head>
<body>
    <h2>Admin Page</h2>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "Complaint ID: " . $row['id'] . "<br>";
            echo "Student ID: " . $row['student_id'] . "<br>";
            echo "Complaint: " . $row['complaint_text'] . "<br>";
            echo "Status: " . $row['status'] . "<br>";
            echo "Created At: " . $row['created_at'] . "<br><br>";
        }
    } else {
        echo "No complaints found.";
    }
    ?>

    <!-- Logout button -->
    <a href="logout.php">Logout</a>
</body>
</html>
