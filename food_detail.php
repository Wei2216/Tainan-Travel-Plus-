<?php
include_once('database_open.php');
if (!isset($_GET['foodDtl']) || empty($_GET['foodDtl'])) {
    header('Location: food_map.php');
    exit;
}

$foodDtl = $_GET['foodDtl'];  // 確保 $foodDtl 已正確設置

// 使用 foodDtl 查詢景點資料
$sql = "SELECT * FROM food_map WHERE food_id = '$foodDtl'";
$result = mysqli_query($conn, $sql);

// 檢查是否有資料
if (mysqli_num_rows($result) > 0) {
    // 取得景點資料
    $row = mysqli_fetch_assoc($result);
    // 將圖片字串轉為陣列,要小心資料庫中包含空白或多餘字符
    $images = explode(",", $row['food_images']);
    $first_image = $images[0];
} else {
    echo '<p>找不到該景點的資料。</p>';
    exit; // 如果查不到資料，退出後續執行
}

// 釋放結果
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include_once('header.php'); ?>

<!-- *********** section food detail 01 (美食詳細介紹) ********** -->
<section id="food_d01" class="py-5">
    <div class="container">
        <!-- 美食資訊 -->
        <div class="inf_content ">
            <h4 class="inf_title"><?= $row['food_name'] ?></h4>
            <p class="inf_description mt-3">
                <?= $row['food_content'] ?>
            </p>
        </div>
        <div class="row">
            <!-- 美食圖片 -->
            <div class="col-md-6 ">
                <img src="./images/Food/<?= $first_image ?>" class="detail_img" alt="">
            </div>

            <div class="col-md-6" id="infData">

                <div class="inf_content">
                    <h4 class="inf_title">地址:</h4>
                    <p class="inf_description"><?= $row['food_add'] ?></p>
                </div>
                <div class="inf_content">
                    <h4 class="inf_title">電話:</h4>
                    <p class="inf_description"><?= $row['food_tel'] ?></p>
                </div>
                <div class="inf_content">
                    <h4 class="inf_title">營業時間:</h4>
                    <ul class="inf_description">
                        <!--  將營業時間字串分割為陣列 -->
                        <?php
                        $optimeArray = preg_split('/\r\n|\r|\n/', $row['food_optime']);
                        foreach ($optimeArray as $time) {
                            echo "<li>" . ($time) . "</li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once('footer.php'); ?>

