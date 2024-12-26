<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../src/Models/Product.php';

$productModel = new Product();
echo json_encode($productModel->getAll());
?>
