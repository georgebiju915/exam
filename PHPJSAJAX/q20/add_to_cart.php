<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$itemId = $_POST['id'];
$itemName = $_POST['name'];
$itemPrice = $_POST['price'];

$item = [
    'id' => $itemId,
    'name' => $itemName,
    'price' => $itemPrice,
    'quantity' => 1
];

$found = false;

foreach ($_SESSION['cart'] as &$cartItem) {
    if ($cartItem['id'] == $itemId) {
        $cartItem['quantity']++;
        $found = true;
        break;
    }
}

if (!$found) {
    $_SESSION['cart'][] = $item;
}

echo json_encode(['status' => 'success']);
?>