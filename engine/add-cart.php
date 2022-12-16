<?php
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
$item_id = $_POST['id'];
$item_price = $_POST['price'];
$item_qty = $_POST['qty'] ?? 1;

$cart_item = [
    'id' => $item_id,
    'price' => $item_price,
    'qty' => $item_qty,
    'total_price' => $item_price * $item_qty
];

$id_checker = [];

foreach ($_SESSION['cart'] as $to_check) {
    array_push($id_checker, $to_check['id']);
}

if (!in_array($item_id, $id_checker)) {
    array_push($_SESSION['cart'], $cart_item);
    header('Location: ../index.php?message=item_added');
} else {
    header('Location: ../index.php?message=item_incart');
}
