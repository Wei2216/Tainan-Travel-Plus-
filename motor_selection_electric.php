<?php include_once('header.php'); ?>

<!-- *********** section motor01 (內容)********** -->
<section id="motor01">
    <div class="container py-5">
        <!-- 分頁 -->
        <ul class="nav nav-tabs mb-3">
            <li class="nav-item">
                <a class="nav-link" href="./motor_selection110.php">110cc-115cc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./motor_selection125.php">125cc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./motor_selection150.php">150cc</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./motor_selection_electric.php">電動車</a>
            </li>
        </ul>
        <!-- 車型 -->
        <?php include_once('database_open.php'); ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-6">
            <!-- 查詢機車資料 -->
            <?php
            $sql = "SELECT * FROM motor_product WHERE motor_type = 'Electric'";
            $result = mysqli_query($conn, $sql);

            // 檢查是否有資料
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // 取得第一張圖片
                    $images = explode(",", $row['motor_images']);
                    $first_image = $images[0]; // 取第一張圖片
            ?>
                    <div class="col text-center">
                        <div class="card motor_box01">
                            <img src="./images/Motor/<?= $row['motor_type'] ?>/<?= $first_image ?>" class="card-img-top" alt="">
                        </div>
                        <div class="card-body my-3">
                            <h4 class="card-title"><?= $row['motor_name'] ?></h4>
                            <h4 class="card-title mt-3">NT$ :<span class="text-danger fw-900"><?= $row['motor_price'] ?></span></h4>
                            <a href="./motor_detail.php?motorDtl=<?= $row['motor_id'] ?>" class="btn index_btn03 mt-3">詳細資料</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-center">目前無 125cc 的車輛提供。</p>';
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

