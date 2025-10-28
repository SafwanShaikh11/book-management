<?php
$files = glob('products/*.json'); // Get all product files
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php include('header.php'); ?>
<main>
    <h2>Product Listing</h2>
    <ul>
        <?php foreach ($files as $file): 
            $product = json_decode(file_get_contents($file), true);
        ?>
            <li>
                <a href="product.php?id=<?= $product['id'] ?>">
                    <?= htmlspecialchars($product['name']) ?> - $<?= htmlspecialchars($product['price']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>
<?php include('footer.php'); ?>
</body>
</html>
