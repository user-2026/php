<?php
session_start();

// Include database connection
include 'db.php';

// Retrieve transactions for the logged-in user
$user_id = $_SESSION['user_id'];
$sql = "SELECT t.*, p.name as product_name FROM transactions t JOIN products p ON t.product_id = p.id WHERE t.buyer_id = $user_id OR p.seller_id = $user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
</head>
<body>
    <h2>Transaction History</h2>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>{$row['purchase_date']} - {$row['product_name']} - Quantity: {$row['quantity']} - Total Amount: {$row['total_amount']}</p>";
        }
    } else {
        echo "No transactions found.";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
