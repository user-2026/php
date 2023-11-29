<?php
// Include database connection
include 'db.php';

// Fetch products from the database
$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Product Listing</h2>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['name']} - {$row['price']} - <a href='product_details.php?id={$row['id']}'>Details</a></p>";
    }
    ?>
    <a href="sell_product.php">Sell Product</a>
    <a href="buy_product.php">Buy Product</a>

   <a href='logout.php'>Logout</a>


</body>
</html>

<?php
$conn->close();
?>
