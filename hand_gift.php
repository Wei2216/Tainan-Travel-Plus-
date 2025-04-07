<?php include_once('database_open.php'); ?>
<?php include_once('header.php'); ?>


<!-- *********** section hand gift 01 (伴手禮推薦) ********** -->
<section id="hand_gift01" class="py-5">
    <div class="container">
        <div class="text-start mt-3 mb-5">
        <h3 class="fw-900 text-danger ">|精選伴手禮 <small class="text-muted h5 ">Present</small></h3>
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-6">
            <!-- 查詢伴手禮資料 -->
            <?php
            $sql = "SELECT * FROM  hand_gift_product";
            $result = mysqli_query($conn, $sql);

            // 檢查是否有資料
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // 取得第一張圖片
                    $images = explode(",", $row['hand_gift_images']);
                    $first_image = $images[0]; // 取第一張圖片
            ?>
                    <div class="col">
                        <div class="card text-center hand_gift_box01">
                            <img src="./images/HandGift/<?= $first_image ?>" class="card-img-top" alt="">
                        </div>
                        <div class="card-body my-3">
                            <h5 class="card-title"><?= $row['hand_gift_name'] ?></h5>
                            <!-- handGftDtl =老師給的程式碼的pkey ,hand_gift_id=老師給的程式碼的pid  -->
                            <a href="./hand_gift_detail.php?handGftDtl=<?= $row['hand_gift_id'] ?>" class="btn index_btn03 mt-3">詳細內容</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-center">目前無伴手禮推薦。</p>';
            }

            // 關閉資料庫連接
            mysqli_close($conn);
            // 釋放結果
            mysqli_free_result($result);
            ?>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>

