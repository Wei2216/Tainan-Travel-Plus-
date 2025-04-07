<?php include_once('header.php');

// 確保 motor_id 存在
if (isset($_GET['motor_id'])) {
    $motor_id = $_GET['motor_id']; // 取得 motor_id
    $sql = "SELECT * FROM motor_product WHERE motor_id = '$motor_id'";
    $result = mysqli_query($conn, $sql);

    // 檢查是否有資料
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo '<p class="text-center">找不到該車輛的資料。</p>';
    }
}
?>
<!-- *********** section motor order form ********** -->
<section id="motor_order_form" class="py-5">
    <div class="container">
        <div class="h3 text-danger fw-900 mt-3">| 預訂車輛 <small class="text-muted h5">
                Order Motor</small></div>

        <div class="row">

            <div class="col-md-10">

                <?php
                if (isset($row)) {
                    echo '<div class="h2 text-center fw-900 inf_title">' . ($row['motor_name']) . '</div>';
                } ?>

                <!-- 表單內容 -->
                <form action="motor_order.php" method="POST">
                    <input type="hidden" name="motor_id" value="<?= $row['motor_id'] ?>">

                    <!-- 姓名 -->
                    <div class="mb-3">
                        <label for="name" class="form-label">姓名</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>

                    <!-- 電子郵件 -->
                    <div class="mb-3">
                        <label for="email" class="form-label">電子郵件</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>

                    <!-- 電話 -->
                    <div class="mb-3">
                        <label for="tel" class="form-label">電話</label>
                        <input type="tel" id="tel" name="tel" class="form-control" required>
                    </div>

                    <!-- 租借數量 -->
                    <div class="mb-3">
                        <label for="quantity" class="form-label">租借數量</label>
                        <input type="number" id="quantity" name="quantity" class="form-control" min=1 max="<?= $row['motor_remainning'] ?>" required>
                    </div>

                    <!-- 租借日期 -->
                    <div class="mb-3">
                        <label for="rental_date" class="form-label">租借日期</label>
                        <input type="date" id="rental_date" name="rental_date" class="form-control" required>
                    </div>

                    <!-- 歸還日期 -->
                    <div class="mb-3">
                        <label for="return_date" class="form-label">歸還日期</label>
                        <input type="date" id="return_date" name="return_date" class="form-control" required>
                    </div>

                    <!-- 預訂按鈕 -->
                    <button type="submit" class="btn btn-success w-100">立即預訂</button>
                </form>
            </div>
        </div>
    </div>
</section>

<?php include_once('footer.php'); ?>

<script>
    $(document).ready(function() {

        // 租借日期不可晚於還車日期

        $('#rental_date').on('change', function() {
            var rentalDate = new Date($(this).val());
            var returnDate = $('#return_date').val();

            if (returnDate && new Date(returnDate) <= rentalDate) {
                alert("還車日期須晚於租借日期");
                $('#return_date').val('');
            }
        });

        $('#return_date').on('change', function() {
            var rentalDate = new Date($('#rental_date').val());
            var returnDate = new Date($(this).val());

            if (returnDate <= rentalDate) {
                alert("還車日期須晚於租借日期");
                $(this).val('');
            }
        });
    });
</script>