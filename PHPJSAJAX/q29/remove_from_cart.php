<?php
session_start();

$product_id = $_POST['product_id'];

foreach ($_SESSION['cart'] as $key => $item) {
    if ($item['id'] == $product_id) {
        unset($_SESSION['cart'][$key]);
        break;
    }
}

echo json_encode(array_values($_SESSION['cart']));
?>