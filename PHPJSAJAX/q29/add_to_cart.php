<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];

$product = [
    'id' => $product_id,
    'name' => $product_name,
    'price' => $product_price,
    'quantity' => 1
];

$found = false;
foreach ($_SESSION['cart'] as &$item) {
    if ($item['id'] == $product_id) {
        $item['quantity'] += 1;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = $product;
}

echo json_encode($_SESSION['cart']);
?>