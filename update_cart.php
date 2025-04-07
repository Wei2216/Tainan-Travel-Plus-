<?php
session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 0;

$_SESSION['cart_items'][$id]=$quantity;

header('Location: cart.php?mode=updated');
?>