<?php
// checkout.php
include_once('header.php');
// session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 模擬結帳處理
    $_SESSION['cart_items'] = [];
    echo '<p>結帳成功！感謝您的選購。</p>';
    echo '<a href="./index.php">返回首頁</a>';
    exit;
}
?>

<div class="container py-5">
    <h1 class="mb-4">結帳</h1>
    <form action="checkout.php" method="POST">
        <p>結帳內容</p>
        <button type="submit" class="btn btn-success">確認結帳</button>
    </form>
</div>
<?php include_once('footer.php'); ?>


