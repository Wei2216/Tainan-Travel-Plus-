<?php
include_once('database_open.php');
if (!isset($_GET['handGftDtl']) || empty($_GET['handGftDtl'])) {
    header('Location: hand_gift.php');
    exit;
}

$handGftDtl = $_GET['handGftDtl'];  // 確保 $handGftDtl 已正確設置

// 使用 hand_gift_detail_id 查詢伴手禮資料
$sql = "SELECT * FROM  hand_gift_product WHERE hand_gift_id = '$handGftDtl'";
$result = mysqli_query($conn, $sql);

// 檢查是否有資料
if (mysqli_num_rows($result) > 0) {
    // 取得伴手禮資料
    $row = mysqli_fetch_assoc($result);
    // 將圖片字串轉為陣列,要小心資料庫中包含空白或多餘字符
    $images = explode(",", $row['hand_gift_images']);
    $first_image = $images[0];
} else {
    echo '<p>找不到該伴手禮的資料。</p>';
    exit; // 如果查不到資料，退出後續執行
}

// 釋放結果
mysqli_free_result($result);
mysqli_close($conn);
?>
<?php include_once('header.php'); ?>

<!-- *********** section hand gift detail 01 (伴手禮詳細介紹) ********** -->
<section id="hand_gift_d01" class="py-5">
    <div class="container">
        <div class="inf_content ">
            <h4 class="inf_title"><?= $row['hand_gift_name'] ?><span><?= $row['hand_gift_nameT'] ?></span></h4>
            <p class="inf_description mt-3">
                <?= $row['hand_gift_content'] ?>
            </p>
        </div>
        <div class="row">
            <!-- 伴手禮圖片 -->
            <div class="col-md-6">
            <img src="./images/HandGift/<?= $first_image ?>" class="detail_img" alt="">
            </div>


            <!-- 伴手禮詳細介紹 -->
            <div class="col-md-6">

                <!-- 消費資訊 -->
                <p class="fs-3 fw-900">NT$ <span class="text-danger fs-3"><?= $row['hand_gift_price'] ?></span> 元</p>
                <!-- 推薦指數 -->
                <p class="fs-3 mb-3">推薦指數:
                    <?php
                    $filledStar = "★"; // 滿星
                    $emptyStar = "☆"; // 空星
                    // 確保 hand_gift_start 已定義並設置合理範圍
                    $gftStart = isset($row['hand_gift_star']) ? intval($row['hand_gift_star']) : 0;
                    $gftStart = max(0, min(5, $gftStart)); // 限制範圍為 0 至 5

                    // 迴圈生成推薦指數星星
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $gftStart) {
                            echo "<span class=\"badge bg-color31 fs-6 m-1\" >$filledStar</span>"; // 顯示已選中的星星
                        } else {
                            echo "<span class=\"badge bg-color15 fs-6 m-1\" >$emptyStar</span>"; // 顯示未選中的星星
                        }
                    }
                    ?>
                </p>
                <!-- 商品數量 -->
                <div class="fs-3">
                    <label for="quantity" class="form-label fs-4">訂購數量：<span><?= $row['hand_gift_unit'] ?></span></label>
                    <input type="number" class="form-control w-75 mx-auto" id="quantity" name="quantity" min="1" max="100" value="1">
                </div>

                <!-- 購物車按鈕 -->
                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-success w-75 fs-4" id="addToCart">
                        <i class="fas fa-shopping-cart mx-3"></i>加入購物車
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>
<script>
    $(function() {
        $('#addToCart').click(function() {
            let quantityVal = $('#quantity').val();
            let idVal = "<?= $row['hand_gift_id'] ?>";
            $.ajax({
                type: 'GET',
                url: 'add_to_cart.php',
                data: {
                    quantity: quantityVal,
                    id: idVal
                },
                error: function() {
                    alert("新增失敗");
                },
                success: function(data) {
                    alert("新增成功");
                    document.getElementById("comparisonCount").innerHTML = data;
                }
            });
        });
    });
</script>