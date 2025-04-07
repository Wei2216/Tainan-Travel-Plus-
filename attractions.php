<?php include_once('database_open.php'); ?>
<?php include_once('header.php'); ?>

<!-- *********** section attractions 01 (景點推薦) ********** -->
<section id="attr01" class="py-5">
    <div class="container">
        <div class="text-start mt-3 mb-5">
            <h3 class="fw-900 text-danger ">|私藏景點 <small class="text-muted h5 ">Secret Place</small></h3>
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-6">
            <!-- 查詢景點資料 -->
            <?php
            $sql = "SELECT * FROM attractions";
            $result = mysqli_query($conn, $sql);

            // 檢查是否有資料
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // 取得第一張圖片
                    $images = explode(",", $row['attractions_images']);
                    $first_image = $images[0]; // 取第一張圖片
            ?>
                    <div class="col">
                        <div class="card text-center attr_box01">
                            <img src="./images/Attractions/<?= $first_image ?>" class="card-img-top" alt="">
                        </div>
                        <div class="card-body my-3">
                            <h5 class="card-title"><?= $row['attractions_name'] ?></h5>
                            <a href="./attractions_detail.php?attrDtl=<?= $row['attractions_id'] ?>" class="btn index_btn03 mt-3">詳細內容</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-center">目前無景點推薦。</p>';
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

