<?php
//input: {"username":"xx", "password":"xx"}
// {"state": true, "message" : "登入成功"}
// {"state": false "message" : "登入失敗"}
// {"state": false "message" : "欄位錯誤"}
// {"state": false "message" : "欄位不得空白"}

$data = file_get_contents("php://input", "r");
$mydata = array();
$mydata = json_decode($data, true);

if (isset($mydata['tel']) && isset($mydata["password"])) {
    if ($mydata['tel'] != "" && $mydata["password"] != "") {
        
        // $p_tel =前面輸入的帳號
        $p_tel = $mydata["tel"];
        
        // $p_password =前面輸入的密碼
        $p_password = $mydata["password"];
        //password_hash("123456", PASSWORD_DEFAULT)

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "tainan_ride_plus";

        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("連線錯誤!" . mysqli_connect_error());
        }

        $sql = "SELECT Tel, Password FROM member WHERE Tel = '$p_tel'";

        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // 印出帳號密碼
            // echo $row["Username"].'<br>';
            // echo $row["Password"].'<br>';
            if (password_verify($p_password, $row["Password"])) {
                //比對正確
                echo '{"state": true, "message" : "登入成功"}';
            } else {
                //比對失敗
                echo '{"state": false, "message" : "登入失敗"}';
            }
        } else {
            echo '{"state": false, "message" : "登入失敗"}';
        }
        mysqli_close($conn);
    } else {
        echo '{"state": false, "message" : "欄位不得空白"}';
    }
} else {
    echo '{"state": false, "message" : "欄位錯誤"}';
}
