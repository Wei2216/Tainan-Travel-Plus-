</main>
<!-- *********** footer (頁尾) ********** -->
<footer class="py-3" style="background-image: linear-gradient(150deg, #B8745D  20%, #FFFCEF  100%);">
    <div class="container">
        <div class="row justify-content-center align-content-center text-center">
            <!-- Logo -->
            <a href="./index.php" class="mb-3">
                <img src="./images/Brand/tainanbike_plus_text.png" alt="">
            </a>
        </div>
        <!-- links -->
        <div class="mb-3 d-flex justify-content-center">
            <div class="mx-3">
                <a href="https://www.facebook.com/traveltainan" target="_blank">
                    <img src="./icon/icon_fb.png" alt="" style="display: block; margin: 0 auto;">
                    <span class="f-text" style="margin-top: 12px; display: inline-block;">台南旅遊粉絲團</span>
                </a>
            </div>
            <div class="mx-3">
                <a href="https://www.instagram.com/tainantravels/" target="_blank">
                    <img src="./icon/icon_ig.png" alt="" style="display: block; margin: 0 auto;">
                    <span class="f-text" style="margin-top: 12px; display: inline-block;">台南の観光</span>
                </a>
            </div>
            <div class="mx-3">
                <a href="https://www.twtainan.net/" target="_blank">
                    <img src="./icon/icon_tainan.png" alt="" style="display: block; margin: 0 auto;">
                    <span class="f-text" style="margin-top: 12px; display: inline-block;">台南市政府旅遊網</span>
                </a>
            </div>
        </div>
        <!-- Copyright -->
        <p class="text-center f-text"> Wei's &copy; 2024 Tainan Travel Plus+ All Rights Reserved.
        </p>
    </div>
</footer>

<script src="./javascript/bootstrap.bundle.min.js"></script>
<script src="./javascript/jquery-3.7.1.js"></script>
<!--來源網址: axios : https://github.com/axios/axios-->
<script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>
<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
<script src="./javascript/wow.min.js"></script>
<script>
    // WOW動畫
    new WOW().init();
    //註冊登入
    const App = {
        data() {
            return {
                tel_reg: '',
                username_reg: '',
                password_reg: '',
                repassword_reg: '',
                email_reg: '',
                chk_reg: false,
                chk_reg_text: '不同意',

                tel_login: '',
                // username_login: '',
                password_login: '',

                flag_tel_reg: false,
                flag_username_reg: false,
                flag_password_reg: false,
                flag_repassword: false,
                flag_email: false,
                
                flag_tel_login: false,
                // flag_username_login: false,
                flag_password_login: false,
            }
        },
        watch: {
            tel_reg: function(newValue) {
                const vm = this;
                // 使用正則表達式檢查是否為 10 位數字
                const telRegex = /^[0-9]{10}$/;
                if (telRegex.test(newValue)) {
                    vm.flag_tel_reg = true;
                } else {
                    vm.flag_tel_reg = false;
                }
            },
            
            username_reg: function(newValue) {
                const vm = this;
                console.log(newValue);
                if (newValue.length > 2 && newValue.length < 7) {
                    //符合規則
                    vm.flag_username_reg = true;
                } else {
                    //不符合規則
                    vm.flag_username_reg = false;
                }
            },
            password_reg: function(newValue) {
                const vm = this;
                console.log(newValue);
                if (newValue.length > 3 && newValue.length < 9) {
                    //符合規則
                    vm.flag_password_reg = true;
                    if (vm.password_reg == vm.repassword_reg) {
                        vm.flag_repassword = true;
                    } else {
                        vm.flag_repassword = false;
                    }
                } else {
                    //不符合規則
                    vm.flag_password_reg = false;
                }
            },
            repassword_reg: function(newValue) {
                const vm = this;
                if (vm.flag_password_reg) {
                    if (vm.password_reg == vm.repassword_reg) {
                        vm.flag_repassword = true;
                    } else {
                        vm.flag_repassword = false;
                    }
                } else {
                    vm.flag_repassword = false;
                }
            },

            email_reg: function(newValue) {
                const vm = this;
                console.log(newValue);
                if (newValue.length > 5 && newValue.length < 16) {
                    //符合規則
                    vm.flag_email = true;
                } else {
                    //不符合規則
                    vm.flag_email = false;
                }
            },

            chk_reg: function(newValue) {
                const vm = this;
                if (vm.chk_reg) {
                    vm.chk_reg_text = '同意';
                } else {
                    vm.chk_reg_text = '不同意';
                }
            },

            tel_login: function(newValue) {
                const vm = this;

                if (newValue != "") {

                    vm.flag_tel_login = true;
                } else {

                    vm.flag_tel_login = false;
                }
            },

            // username_login: function(newValue) {
            //     const vm = this;

            //     if (newValue != "") {

            //         vm.flag_username_login = true;
            //     } else {

            //         vm.flag_username_login = false;
            //     }
            // },

            password_login: function(newValue) {
                const vm = this;

                if (newValue != "") {

                    vm.flag_password_login = true;
                } else {

                    vm.flag_password_login = false;
                }
            },
        },
        methods: {
            register() {
                const vm = this;
                if (vm.flag_tel_reg && vm.flag_username_reg && vm.flag_password_reg && vm.flag_repassword && vm.flag_email && vm.chk_reg) {
                    //傳遞註冊資料至後端API
                    // Send a POST request
                    //{"username":"admin01", "password":"", "email":"test@test.com"} 老師的
                    var dataJSON = {};
                    dataJSON["tel"] = vm.tel_reg;
                    dataJSON["username"] = vm.username_reg;
                    dataJSON["password"] = vm.password_reg;
                    dataJSON["email"] = vm.email_reg;
                    console.log(JSON.stringify(dataJSON));
                    axios({
                            method: 'post',
                            url: './member_register_api.php',
                            data: JSON.stringify(dataJSON)
                        }).then(function(response) {
                            console.log(response);
                            if (response.data.state) {
                                alert(response.data.message);
                                location.href = "./index.php";
                            } else {
                                alert(response.data.message);
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert("欄位錯誤請修正!");
                }
            },
            login() {
                const vm = this;
                if (vm.flag_tel_login && vm.flag_password_login) {
                    //傳遞登入資料至後端API
                    // Send a POST request
                    //{"username":"admin01", "password":""}
                    var dataJSON = {};
                    dataJSON["tel"] = vm.tel_login;
                    dataJSON["password"] = vm.password_login;
                    console.log(JSON.stringify(dataJSON));
                    axios({
                            method: 'post',
                            url: './member_login_api.php',
                            data: JSON.stringify(dataJSON)
                        }).then(function(response) {
                            console.log(response);
                            if (response.data.state) {
                                alert(response.data.message);
                                location.href = "./index.php";
                            } else {
                                alert(response.data.message);
                            }
                        })
                        .catch(function(error) {
                            console.log(error);
                        });
                } else {
                    alert("帳密不可以空白!");
                }
            }
        }
    }
    Vue.createApp(App).mount('#app');
</script>

</body>

</html>