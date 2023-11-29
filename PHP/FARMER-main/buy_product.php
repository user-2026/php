<?php
session_start();

// Include database connection
include 'db.php';

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Retrieve product details
    $product_sql = "SELECT * FROM products WHERE id=$product_id";
    $product_result = $conn->query($product_sql);

    if ($product_result->num_rows > 0) {
        $product = $product_result->fetch_assoc();

        // Calculate total amount
        $total_amount = $product['price'] * $quantity;

        // Check if the buyer has enough quantity in stock
        if ($quantity <= $product['quantity']) {
            // Update product quantity in the database
            $new_quantity = $product['quantity'] - $quantity;
            $update_sql = "UPDATE products SET quantity=$new_quantity WHERE id=$product_id";
            $conn->query($update_sql);

            // Record the transaction
            $buyer_id = $_SESSION['user_id'];
            $transaction_sql = "INSERT INTO transactions (product_id, buyer_id, quantity, total_amount) VALUES ($product_id, $buyer_id, $quantity, $total_amount)";
            $conn->query($transaction_sql);

            echo "Purchase successful!";
        } else {
            echo "Insufficient quantity in stock.";
        }
    } else {
        echo "Product not found.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Products</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Buy Products</h2>
        
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<div class='product'>";
            echo "<p>{$row['name']} - Price: {$row['price']} - Quantity available: {$row['quantity']}</p>";
            echo "<form action='buy_product.php' method='POST'>";
            echo "<input type='hidden' name='product_id' value='{$row['id']}'>";
            echo "<label for='quantity'>Quantity:</label>";
            echo "<input type='number' name='quantity' value='1' min='1' max='{$row['quantity']}' required>";
            echo "<button type='submit'>Buy</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
