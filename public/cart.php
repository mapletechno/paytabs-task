<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../autoload.php';

use App\Models\Product;
use App\Database as Database;
$productModel = new Product();
$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$productsInCart = [];

if (!empty($cart)) {
    $productIds = array_keys($cart); // Get array of product IDs
    if (!empty($productIds)) {
        $productsInCart = $productModel->getProductsByIds($productIds);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Your Shopping Cart</h1>
        <a href="index.php">Continue Shopping</a>
    </header>

    <main>
        <?php if (!empty($productsInCart)): ?>
            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productsInCart as $item): ?>
                        <tr><b style="color:red">
                            <?php
                            print_r($cart[$item['id']]['quantity']);

                            ?></b>
                            <td><?= htmlspecialchars($item['name']) ?></td>
                            <td>$<?= number_format($item['price'], 2) ?></td>
                            <td><?= htmlspecialchars($cart[$item['id']]['quantity']) ?></td>
                            <td>$<?= number_format($item['price'] * $cart[$item['id']]['quantity'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Your cart is empty.</p>
        <?php endif; ?>
    </main>
</body>
</html>