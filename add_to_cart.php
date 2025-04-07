<?php
//<!-- 一維陣列購物車 -->
//session_start();放在伺服器的變數
session_start();
header("Content-Type: text/json");
//  get the product id
$id = $_GET['id'];
$quantity = $_GET['quantity'];
//  cart_items 變數名稱
//  $_SESSION 暫存於使用者主機
//  判斷主機是否有cart_items的變數
if(!isset($_SESSION['cart_items'])){
//     // 如果沒有 建立名叫cart_items 的陣列
     $_SESSION['cart_items'] = array();
}

// // 如果array_key_exists($id, $_SESSION['cart_items'])
// // 找出 有符合 $id 的 欄位
if(array_key_exists($id, $_SESSION['cart_items'])){   
//     // 直接加上數量
     $_SESSION['cart_items'][$id]=$_SESSION['cart_items'][$id]+$quantity;
 }
else{
//     // 不然 陣列 等於 數量
     $_SESSION['cart_items'][$id]=$quantity;
}

$count= count($_SESSION['cart_items']);
echo json_encode($count,JSON_UNESCAPED_UNICODE);//json編碼

//<!-- -------一維陣列購物車結束----- -->



?>








