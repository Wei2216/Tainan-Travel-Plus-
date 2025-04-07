<?php
include_once('database_open.php');

// 確保表單資料存在
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // 取得表單資料
    $motor_id = $_POST['motor_id'];
    $name =  $_POST['name'];
    $email =  $_POST['email'];
    $tel =  $_POST['tel'];
    $quantity = $_POST['quantity'];
    $rental_date = $_POST['rental_date'];
    $return_date = $_POST['return_date'];

    // 計算租借天數
    $rental_date_timestamp = strtotime($rental_date);
    $return_date_timestamp = strtotime($return_date);
    $rental_days = ($return_date_timestamp - $rental_date_timestamp) / (60 * 60 * 24); // 計算天數

    if ($rental_days <= 0) {
        echo "歸還日期必須晚於租借日期";
        exit;
    }

    // 查詢租借的車款資料
    $sql = "SELECT motor_price FROM motor_product WHERE motor_id = '$motor_id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $motor_price = $row['motor_price'];

        // 計算總金額（每日價格 * 數量 * 天數）
        $total_price = $motor_price * $quantity * $rental_days;
    } else {
        echo "查無此車輛資料";
        exit;
    }



    // 插入訂單資料
    $sql_insert = "INSERT INTO motor_order (motor_id, Name, Email, Tel, Quantity, Rental_date, Return_date, Total_price) 
                   VALUES ('$motor_id', '$name', '$email', '$tel', '$quantity', '$rental_date', '$return_date', '$total_price')";

    if (mysqli_query($conn, $sql_insert)) {
        echo "<script>alert('訂單已成功提交，感謝您的預訂！以下為您預定的明細:您預定的天數為: $rental_days 天，合計金額為: $total_price 元');</script>";
        // 訂單提交成功後，轉回首頁
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('訂單提交失敗，請稍後再試。');</script>";
    }

    // 關閉資料庫連線
    mysqli_close($conn);
}
