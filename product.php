<?php
if (!isset($_GET['id'])) {
    die("Invalid Product ID");
}

$id = $_GET['id'];
$file = "products/product$id.json";
if (!file_exists($file)) {
    die("Product not found");
}

$product = json_decode(file_get_contents($file), true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include('header.php'); ?>
<main>
    <h2><?= htmlspecialchars($product['name']) ?></h2>
    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
    <p><?= htmlspecialchars($product['description']) ?></p>
    <p>Price: $<?= htmlspecialchars($product['price']) ?></p>
    <button onclick="addToWishlist(<?= $product['id'] ?>)">Add to Wishlist</button>
</main>
<?php include('footer.php'); ?>
<script src="js/wishlist.js"></script>
</body>
</html>
