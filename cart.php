<?php 
include_once('header.php');


$mode = isset($_GET['mode']) ? $_GET['mode'] : "";

if ($mode == 'removed') {
    echo '<script>alert("品項移除成功")</script>';
} else if ($mode == 'updated') {
    echo '<script>alert("數量修改成功")</script>';
}

// 判斷有無資料
if (isset($_SESSION['cart_items']) && count($_SESSION['cart_items']) > 0) {

    require 'database_open.php';
   
    echo '<section id="cart" class="py-5">';
    echo '<div class="container">';
    echo '<h3 class="text-danger fw-900 my-3">| 購物車內容 <small class="text-muted h5">Cart</small></h3>';
    echo '<table class="table table-bordered">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>商品名稱</th>';
    echo '<th>價格</th>';
    echo '<th>數量</th>';
    echo '<th>金額</th>';
    echo '<th>功能</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    $total_price = 0;
    $total_quantity = 0;

    foreach ($_SESSION['cart_items'] as $id => $quantity) {

        $sql = "SELECT * FROM hand_gift_product WHERE hand_gift_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        $subtotal = $quantity * $row['hand_gift_price'];
        $total_price += $subtotal;
        $total_quantity += $quantity;

        echo "<tr>";
        echo "<td>{$row['hand_gift_name']}</td>";
        echo "<td>&#36;{$row['hand_gift_price']}</td>";
        echo "<td><input name='quantity' id='{$row['hand_gift_id']}quantity' type='number' class='form-control' value='$quantity' min='1'></td>";
        echo "<td>&#36;{$subtotal}</td>";
        echo "<td>";
        echo "<button type='button' class='btn btn-warning me-4' onclick=\"update_cart('{$row['hand_gift_id']}')\"><i class='fas fa-edit'></i></button>";
        echo "<a href='./remove_from_cart.php?id={$row['hand_gift_id']}'><button type='button' class='btn btn-danger'><i class='fas fa-trash-alt'></i></button></a>";
        echo "</td>";
        echo "</tr>";
    }

    echo "<tr>";
    echo "<td colspan='3'><b>總金額</b></td>";
    echo "<td>&#36;{$total_price}</td>";
    echo "<td></td>";
    echo "</tr>";
    echo '</tbody>';
    echo '</table>';

    echo "<div class='d-flex justify-content-end'>";
    echo "<a href='./hand_gift_detail.php' class='btn btn-secondary me-3'>繼續選購</a>";
    echo "<a href='./checkout.php' class='btn btn-success'>結帳</a>";
    echo "</div>";

    echo '</div>';
    echo '</section>';
} else {
    echo "<div class='alert alert-danger'>";
    echo "<strong>購物車中無資料!</strong>";
    echo "</div>";
}


include_once('footer.php');
?>
    <script>
    function update_cart(id) {
        var idquantity = id + "quantity";
        quantity = document.getElementById(idquantity).value;
        window.location.assign("update_cart.php?id=" + id + "&quantity=" + quantity);
    };
</script>