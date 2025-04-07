<?php
include_once('database_open.php');
if (!isset($_GET['motorDtl']) || empty($_GET['motorDtl'])) {
    header('Location: motor_selection110.php'); //這要改
    exit;
}

$motorDtl = $_GET['motorDtl'];  // 確保 $motorDtl 已正確設置

// 使用 $motorDtl 查詢機車資料
$sql = "SELECT * FROM motor_product WHERE motor_id = '$motorDtl'";
$result = mysqli_query($conn, $sql);

// 檢查是否有資料
if (mysqli_num_rows($result) > 0) {
    // 取得機車資料
    $row = mysqli_fetch_assoc($result);
    // 將圖片字串轉為陣列,要小心資料庫中包含空白或多餘字符
    $images = explode(",", $row['motor_images']);
} else {
    echo '<p>找不到該車款的資料。</p>';
    exit; // 如果查不到資料，退出後續執行
}

// 釋放結果
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include_once('header.php'); ?>
<!-- *********** section motor detail 01 (內容)********** -->
<section id="motor_d01" class="py-5">
    <div class="container">
        <div class="h3 text-danger fw-900 mt-3">|車款內容 <small class="text-muted h5 ">Content</small></div>
        <div class="row">
            <div class="col-md-8">
                <div style="text-align: center;">
                    <img src="./images/Motor/<?= $row['motor_type'] ?>/<?= $images[0] ?>" class="img-fluid" id="show-img" alt="">
                </div>

                <ul class="list-unstyled d-flex justify-content-evenly flex-nowrap" id="show-img-details">
                    <?php foreach ($images as $index => $image): ?>
                        <li class="text-nowrap me-1">
                            <img src="./images/Motor/<?= $row['motor_type'] ?>/<?= $image ?>" class="img-fluid" id="show-img <?= $index ?>" alt="">
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="col-md-4">
                <!-- 車型標題 -->
                <div class="fs-2 fw-900" style="color:var(--color05);"><?= $row['motor_name'] ?></div>
                <!-- 車款介紹 -->
                <p class="text-muted fs-4" style="color:var(--color03);"><?= $row['motor_content'] ?></p>
                <p class="fs-4 fw-900 mb-4" style="color:var(--color05);">車型特色:
                    <span class="badge bg-success fs-6 me-3">穩定動力</span>
                    <span class="badge bg-warning fs-6 me-3">省油性能</span>
                    <span class="badge bg-danger fs-6 me-3">舒適騎行</span>
                    <span class="badge bg-info fs-6">運動感設計</span>
                </p>
                <!-- 租金資訊 -->
                <p class="fs-4 fw-900" style="color:var(--color05);">日租金: <span class="text-danger fs-4"><?= $row['motor_price'] ?></span> 元</p>

                    <a href="motor_order_form.php?motor_id=<?= $row['motor_id'] ?>" class="btn btn-success w-100">立即預訂</a>
            </div>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>

<script>
$(function () {
    $("#show-img-details li img").hover(function () {
        console.log($(this).attr("src"));
        thisimg = $(this).attr("src");
        $("#show-img").attr("src", thisimg);
    });
});
</script>