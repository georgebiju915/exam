<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$cartItemsHtml = '';
$total = 0;

foreach ($_SESSION['cart'] as $cartItem) {
    $cartItemsHtml .= '<p>' . htmlspecialchars($cartItem['name']) . ' - $' . $cartItem['price'] . ' x ' . $cartItem['quantity'] . '</p>';
    $total += $cartItem['price'] * $cartItem['quantity'];
}

echo json_encode([
    'items' => $cartItemsHtml,
    'total' => $total
]);
?>