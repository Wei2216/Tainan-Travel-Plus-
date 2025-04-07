<?php
session_start();

// $id $_GET['id']; 兩個寫法一樣
$id = isset($_GET['id']) ? $_GET['id'] : "";

// 刪除陣列
unset($_SESSION['cart_items'][$id]);

header('Location: cart.php?mode=removed');
?>
