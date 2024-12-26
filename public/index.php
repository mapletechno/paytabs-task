<?php
session_start();
require_once __DIR__ . '/../autoload.php';
use App\Models\Product;
//if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
//}

$productModel = new Product();
$products = $productModel->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Welcome to Our Store</h1>
    </header>
    <main>
        <div id="product-list">
            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?= htmlspecialchars($product['name']) ?></h3>
                    <p>Price: $<?= number_format($product['price'], 2) ?></p>
                    <button class="add-to-cart" data-quantity="1" data-csrf="<?= $_SESSION['csrf_token']?>" data-product-id="<?= $product['id'] ?>">Add to Cart</button>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <script src="js/cart.js"></script>
</body>
</html>
