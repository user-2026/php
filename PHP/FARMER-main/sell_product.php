<?php
session_start();

// Check if the user is logged in and is a farmer
if (!isset($_SESSION['user_id']) || $_SESSION['type'] !== 'farmer') {
    header("Location: login.php");
    exit();
}

// Include database connection
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];

    // Get the seller ID from the session
    $seller_id = $_SESSION['user_id'];

    // Insert the product into the database
    $sql = "INSERT INTO products (name, description, price, quantity, seller_id) VALUES ('$name', '$description', $price, $quantity, $seller_id)";
    
    if ($conn->query($sql) === TRUE) {
        echo "Product listed for sale successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sell Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Sell Product</h2>

        <form action="sell_product.php" method="POST">
            <label for="name">Product Name</label>
            <input type="text" name="name" required>
            
            <label for="description">Description</label>
            <textarea name="description" rows="4" required></textarea>

            <label for="price">Price</label>
            <input type="number" name="price" step="0.01" required>

            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" required>

            <button type="submit">List Product</button>
        </form>
    </div>
</body>
</html>
