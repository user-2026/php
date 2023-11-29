<?php
session_start();

if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "student") {
    header("Location: index.php");
    exit();
}

$connection = mysqli_connect("localhost", "root", "", "att");

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$username = $_SESSION["username"];
$query = "SELECT * FROM attendance WHERE student_id = (SELECT id FROM class_students WHERE username = '$username')";
$result = mysqli_query($connection, $query);

if (!$result) {
    die("Error in SQL query: " . mysqli_error($connection));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Attendance</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        input[type="submit"] {
            padding: 10px;
            background-color: #4caf50;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Your Attendance</h2>

    <!-- Display the attendance records for the logged-in student... -->
    <table>
        <tr>
            <th>Date</th>
            <th>Status</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["attendance_date"] . "</td>";
            echo "<td>" . $row["status"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <form action="logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
