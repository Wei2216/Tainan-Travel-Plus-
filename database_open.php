<?php

$db_host = "localhost"; //主機名稱
$db_user = "root"; //使用者名稱 (可改為root)
$db_password = ""; //沒設置密碼，空符號""就可以！
$db_name = "tainan_ride_plus"; //資料庫名稱


// (建立連線)參數位置順序應為如下：順序錯誤會產生連線錯誤
$conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);

// Check connection(確認連線)
if (!$conn) {
    die("連線錯誤: " . mysqli_connect_error());
}

// echo "連線成功";

?>
