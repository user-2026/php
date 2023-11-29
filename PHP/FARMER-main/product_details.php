<?php
// Include database connection
include 'db.php';

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    $sql = "SELECT * FROM products WHERE id=$product_id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Product Details</h2>
    <?php
    if ($product) {
        echo "<p>Name: {$product['name']}</p>";
        echo "<p>Description: {$product['description']}</p>";
        echo "<p>Price: {$product['price']}</p>";
        // Add more details as needed
    } else {
        echo "Product not found";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
