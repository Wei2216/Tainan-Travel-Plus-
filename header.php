<?php
session_start();
include_once('database_open.php');
// $navsql="SELECT * FROM  hand_gift_product ";  
// $navresult = mysqli_query($conn,$navsql);
if (!isset($_SESSION['cart_items'])) {
    $count = "0";
} else {
    $count = count($_SESSION['cart_items']);
}
?>
<!-- *********** section01 (導覽列) 至登入 ********** -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./bootstrap/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="./css/tainan_color.css">
    <link rel="stylesheet" href="./css/text.css">
    <link rel="stylesheet" href="./style.css">
    <title>Tainan Travel Plus+</title>

</head>

<body id="app">
    <header style="background-image: url(./images/Brand/nav.png);">
        <!-- *********** section01 (導覽列)********** -->
        <!-- navbar-dark-將導航欄中的文字顏色設置為淺色，通常是白色或淺灰色，適合在深色背景下使用。bg-dark-這個類別會將導航欄的背景顏色設置為深色，通常是黑色或深灰色 -->
        <!-- fixed-top(使用者滑動時，導覽列維持在頁面上方) -->
        <section id="s01">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-xl">
                        <!-- 行動裝置的折疊按鈕 -->
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- 品牌名稱或 Logo -->
                        <a class="navbar-brand" href="./index.php">
                            <img src="./images/Brand/tainanbike_plus_logo5.gif?<?php echo time(); ?>" alt="" style="height:100px;">
                        </a>
                        <!-- me-auto (margin-end: auto) 將導航欄 ul 元素沾滿剩餘的空間，將 ul 推向左側，剩餘的空間自動分配給右側的按鈕容器-->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mt-5 fs-5">
                                <li class="nav-item me-lg-2">
                                    <!-- active只能一個會亮！  -->
                                    <!-- aria-current="page" 導航列的當前項目(無障礙使用) -->
                                    <a class="nav-link active " aria-current="page" href="./index.php">首頁</a>
                                </li>
                                <!-- 下拉選單 -->
                                <!-- aria-expanded="false" 目標內容目前是折疊（隱藏） -->
                                <!-- role="button" data-bs-toggle="dropdown" -->
                                <li class="nav-item dropdown me-lg-2">
                                    <a class="nav-link dropdown-toggle" href="./motor_selection110.php" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        車型選擇
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="./motor_selection110.php">110cc-115cc</a></li>
                                        <li><a class="dropdown-item" href="./motor_selection125.php">125cc</a></li>
                                        <li><a class="dropdown-item" href="./motor_selection150.php">150cc</a></li>
                                        <li><a class="dropdown-item" href="./motor_selection_electric.php">電動車</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item me-lg-2">
                                    <a class="nav-link" href="./attractions.php">私藏景點</a>
                                </li>
                                <li class="nav-item me-lg-2">
                                    <a class="nav-link" href="./food_map.php">台南好味道</a>
                                </li>
                                <li class="nav-item me-lg-2">
                                    <a class="nav-link" href="./hand_gift.php">精選伴手禮</a>
                                </li>
                            </ul>

                            <!-- 登入/註冊/購物車 按鈕 新增加的 -->
                            <div class=" justify-content-end mb-5">
                                <button class="btn btn-outline-dark me-3 me-lg-2" data-bs-toggle="modal"
                                    data-bs-target="#loginModal">
                                    <i class="fas fa-sign-in-alt"></i>登入
                                </button>
                                <button class="btn btn-outline-dark me-3 me-lg-2" data-bs-toggle="modal"
                                    data-bs-target="#registerModal"><i class="fas fa-user-plus"></i>註冊</button>
                                <a href="./cart.php">
                                    <button type="button" class="btn btn-outline-dark me-3 me-lg-2">
                                        <i class="fas fa-shopping-cart"></i> <span id="comparisonCount">(<?= $count ?>)</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </section>
        <!-- loginModal -->
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">登入帳號</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="" class="form-label">帳號</label>
                            <input type="tel" class="form-control
                            " placeholder="帳號為您的手機號碼"
                                :class="{'is-invalid' : !flag_tel_login}"
                                v-model="tel_login">
                            <div class="invalid-feedback">帳號不得為空白</div>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">密碼</label>
                            <input type="password" class="form-control" :class="{'is-invalid' : !flag_password_login}"
                                v-model="password_login">
                            <div class="invalid-feedback">密碼不得為空白</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary w-100" @click="login">登入</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- registerModal -->
        <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">台南騎遊 Plus+ 註冊會員規定</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <p>1.會員資格:凡年滿 18 歲並持有有效身份證件（台灣身分證、居留證或護照）者均可註冊成為會員，租借機車服務需另提供有效駕駛執照。</p>
                            <p>2.會員資料:註冊時需提供正確且完整的個人資料，包括姓名、聯絡電話、電子郵件等，若有資料變更，需立即更新，以確保服務正常運作。</p>
                            <p>3.會員權益:註冊會員可專享機車租借折扣、伴手禮預購優惠及行程推薦專屬服務，會員累積消費可兌換點數，用於未來折抵或兌換贈品。</p>
                            <p>4.會員責任:使用會員帳戶進行任何交易時，需自行負責帳戶安全，並不得將帳號轉借他人使用。違反服務條款（如提供不實資料、違規使用機車）將取消會員資格，並依法追究相關責任。</p>
                            <p>5.隱私與資料保護:所有會員資料僅供服務使用，不會對外公開或轉售予第三方，我們承諾依據《個人資料保護法》妥善保存並保護您的隱私。</p>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="" class="form-label">帳號</label>
                                    <input type="tel" class="form-control
                            " placeholder="請輸入您的手機號碼:0912345678" v-model="tel_reg"
                                        :class="{'is-invalid': !flag_tel_reg , 'is-valid' :flag_tel_reg }">
                                    <div class="valid-feedback">帳號符合規定</div>
                                    <div class="invalid-feedback">帳號不符合規定</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">姓名</label>
                                    <input type="text" class="form-control" v-model="username_reg" placeholder="字數3-6"
                                        :class="{'is-valid' : flag_username_reg, 'is-invalid' : !flag_username_reg}">
                                    <div class="valid-feedback">符合規定</div>
                                    <div class="invalid-feedback">不符合規定</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">密碼</label>
                                    <input type="password" class="form-control" v-model="password_reg" placeholder="字數4-8"
                                        :class="{'is-valid' : flag_password_reg, 'is-invalid' : !flag_password_reg}">
                                    <div class="valid-feedback">符合規定</div>
                                    <div class="invalid-feedback">不符合規定</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">確認密碼</label>
                                    <input type="password" class="form-control" v-model="repassword_reg"
                                        :class="{'is-valid' : flag_repassword, 'is-invalid' : !flag_repassword}">
                                    <div class="valid-feedback">符合規定</div>
                                    <div class="invalid-feedback">不符合規定</div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Email</label>
                                    <input type="email" class="form-control" v-model="email_reg" placeholder="字數6-15"
                                        :class="{'is-valid' : flag_email, 'is-invalid' : !flag_email}">
                                    <div class="valid-feedback">符合規定</div>
                                    <div class="invalid-feedback">不符合規定</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" name="" id="" v-model="chk_reg"
                                    :class="{'is-valid' : chk_reg, 'is-invalid' : !chk_reg}">
                                <label for="" class="form-check-label">{{ chk_reg_text }}</label>
                                <div class="invalid-feedback">同意才能註冊</div>
                            </div>
                        </div>
                        <div>
                            <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">取消</button>
                            <button type="button" class="btn btn-primary" @click="register">註冊</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <main id="main-content" style="background-image: url(./images/Brand/main.png);">