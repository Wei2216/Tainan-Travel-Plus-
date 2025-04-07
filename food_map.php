<?php include_once('database_open.php'); ?>
<?php include_once('header.php'); ?>


<!-- *********** section food 01 (美食推薦) ********** -->
<section id="food01" class="py-5">
    <div class="container">
        <div class="text-start mt-3 mb-5">
        <h3 class="fw-900 text-danger ">|台南好味道 <small class="text-muted h5 ">Local Food</small></h3>
            <hr>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-6">
            <!-- 查詢美食資料 -->
            <?php
            $sql = "SELECT * FROM food_map";
            $result = mysqli_query($conn, $sql);

            // 檢查是否有資料
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    // 取得第一張圖片
                    $images = explode(",", $row['food_images']);
                    $first_image = $images[0]; // 取第一張圖片
            ?>
                    <div class="col">
                        <div class="card text-center food_box01">
                            <img src="./images/Food/<?= $first_image ?>" class="card-img-top img-fluid" alt="">
                        </div>
                        <div class="card-body my-3">
                            <h5 class="card-title"><?= $row['food_name'] ?></h5>
                            <a href="./food_detail.php?foodDtl=<?= $row['food_id'] ?>" class="btn index_btn03 mt-3 mb-3">詳細內容</a>
                        </div>
                    </div>
            <?php
                }
            } else {
                echo '<p class="text-center">目前無美食推薦。</p>';
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


<!-- Ajax請求有成功 -->
<!-- <script>
    $(function() {
        $.ajax({
            type: "GET",
            url: "./json/shops_zh-tw.json",
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

