<?php
include_once('database_open.php');
if (!isset($_GET['attrDtl']) || empty($_GET['attrDtl'])) {
    header('Location: attractions.php');
    exit;
}

$attrDtl = $_GET['attrDtl'];  // 確保 $attrDtl 已正確設置

// 使用 $attrDtl 查詢景點資料
$sql = "SELECT * FROM attractions WHERE attractions_id = '$attrDtl'";
$result = mysqli_query($conn, $sql);

// 檢查是否有資料
if (mysqli_num_rows($result) > 0) {
    // 取得景點資料
    $row = mysqli_fetch_assoc($result);
    // 將圖片字串轉為陣列,要小心資料庫中包含空白或多餘字符
    $images = explode(",", $row['attractions_images']);
} else {
    echo '<p>找不到該景點的資料。</p>';
    exit; // 如果查不到資料，退出後續執行
}

// 釋放結果
mysqli_free_result($result);
mysqli_close($conn);
?>

<?php include_once('header.php'); ?>

<!-- *********** section attractions detail 01 (景點詳細介紹) ********** -->
<section id="attr_d01" class="py-5">
    <div class="container">
        <!-- 景點名稱 -->
        <div class="inf_content my-3">
            <h4 class="inf_title"><?= $row['attractions_name'] . " : " ?></h4>
            <p class="inf_description mt-3" ><?= $row['attractions_content'] ?></p>
        </div>
        <div class="row">
            <div class="col-md-6">
            <!-- 景點圖片輪播 -->
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" data-bs-pause="false">
                    <div class="carousel-indicators">
                        <?php
                        // 生成動態的輪播指示
                        foreach ($images as $index => $image) {
                            echo '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="' . $index . '" class="' . ($index == 0 ? 'active' : '') . '" aria-label="Slide ' . ($index + 1) . '"></button>';
                        }
                        ?>
                    </div>
                    <div class="carousel-inner">
                        <?php
                        // 生成動態的輪播項目
                        foreach ($images as $index => $image) {
                            echo '<div class="carousel-item ' . ($index == 0 ? 'active' : '') . '">
                                    <img src="./images/Attractions/' . $image . '" class="d-block  detail_img" alt="">
                                  </div>';
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="inf_content">
                    <h4 class="inf_title">地址:</h4>
                    <span class="inf_description"><?= $row['attractions_add'] ?></span>
                </div>
                <div class="inf_content">
                    <h4 class="inf_title">電話:</h4>
                    <span class="inf_description"><?= $row['attractions_tel'] ?></span>
                </div>
                <div class="inf_content">
                    <h4 class="inf_title">營業時間:</h4>
                    <ul class="inf_description">
                        <!--  將營業時間字串分割為陣列 -->
                        <?php
                        $optimeArray = preg_split('/\r\n|\r|\n/', $row['attractions_optime']);
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


<!-- Ajax請求有成功 -->
<!-- <script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "./json/attractions_zh-tw.json",
            dataType: "json",
            success: showData,
            error: function() {
                console.log("error-JSON Missing");
            }
        });
    });

    function showData(data) {
        // console.log(data); // 輸出所有資料

        $("#attrData").empty(); // 清空先前資料

        for (var i = 0; i < data.length; i++) {
            // console.log(data[i])輸出每筆資料的全部內容
            // 只處理特定筆數資料
            const attrId = [571,572, 671, 673, 674, 730, 739, 740, 749, 753, 754, 797, 798, 802, 806, 809, 810, 812, 815, 816, 1324, 1345, 5520, 5533, 5572, 6005];
            if (attrId.include_onces(data[i].id)) {

                // console.log(data[i].name);

                var name = data[i].name;
                var intro = data[i].introduction;
                var add = data[i].address;
                var tel = data[i].tel;
                var openTime = data[i].open_time;

                // 動態生成 HTML 組件
                var strHTML = `
                    <div class="col-md-4">
                        <div class="inf_content my-3">
                            <h4 class="inf_title">${name} : 
                            </h4>
                            <p class="inf_description mt-3">${intro}</p>
                        </div>
                        <div class="inf_content">
                            <h4 class="inf_title">地址:</h4>
                            <p class="inf_description">${add}</p>
                        </div>
                        <div class="inf_content">
                            <h4 class="inf_title">電話:</h4>
                            <p class="inf_description">${tel}</p>
                        </div>
                        <div class="inf_content">
                            <h4 class="inf_title">營業時間:</h4>
                            <ul class="inf_description">
                                <li>${openTime}</li>
                            </ul>
                        </div>
                    </div>
                `;
                $("#attrData").append(strHTML);
            }
        }
    }
</script> -->
