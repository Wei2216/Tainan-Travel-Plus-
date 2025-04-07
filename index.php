<?php include_once('header.php'); ?>

<!-- *********** section02 (主視覺-橫幅) ********** -->
<section id="s02">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000" data-bs-pause="false">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item bg-cover active"
                style="background-image: url(./images/Brand/20250104motor_brand.png); height: 500px;">
                <!--active 只能有一個 -->
                <div class="carousel-caption d-none d-md-block p-3 rounded-3 shadow-lg"
                    style="background-color: rgba(0, 0, 0, 0.3);">
                    <h3 class="fw-900">輕鬆租車，遊遍府城</h3>
                    <p class="fs-5">各式廠牌機車任您挑選，是是您探索台南古城的最佳夥伴！</p>
                </div>
            </div>
            <div class="carousel-item bg-cover"
                style="background-image: url(./images/Brand/attr20250105.jpg); height: 500px;">
                <div class="carousel-caption d-none d-md-block p-3 rounded-3 shadow-lg"
                    style="background-color: rgba(0, 0, 0, 0.3);">
                    <h3 class="fw-900">店家私藏行程推薦</h3>
                    <p class="fs-5">提供您輕鬆享受台南景點與文化。</p>
                </div>
            </div>
            <div class="carousel-item bg-cover"
                style="background-image: url(./images/Brand/gift20250105.png); height: 500px;">
                <div class="carousel-caption d-none d-md-block p-3 rounded-3 shadow-lg"
                    style="background-color: rgba(0, 0, 0, 0.3);">
                    <h3 class="fw-900">店家精選台南必買伴手禮</h3>
                    <p class="fs-5">台南經典伴手禮，每件都承載府城百年滋味與故事。</p>
                </div>
            </div>
            <div class="carousel-item bg-cover"
                style="background-image: url(./images/Brand/food20250105.jpg); height: 500px;">
                <div class="carousel-caption d-none d-md-block p-3 rounded-3 shadow-lg"
                    style="background-color: rgba(0, 0, 0, 0.3);">
                    <h3 class="fw-900">店家精選台南各式傳統美食</h3>
                    <p class="fs-5">從牛肉湯到碗粿，帶您探索台南府城道地美食。</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<!-- *********** section03 (內容-我們的服務) ********** -->
<section id="s03" class="py-3">
    <div class="container">
        <div class="text-center mt-3">
            <h1 style="color:var(--color27);"><img src="./icon/motorcycle.png" alt="" class="wow animate__zoomIn" data-wow-duration="3s"
            data-wow-delay="0s" data-wow-iteration="1" style="height:60px; margin-right: 10px;">服務及推薦</h1>
            
            <p class="text-muted fs-4">從租車、景點、美食、伴手禮一站，滿足您所有需求</p>
        </div>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-6 ">
            <div class="col text-center mt-3">
                <div class="card index_box03">
                    <img src="./images/Motor/110cc-115cc/Kymco_imany_black110.png" class="card-img-top" alt="picture">
                </div>
                <div class="card-body my-3">
                    <h4 class="card-title">【車型選擇】</h4>
                    <a href="./motor_selection110.php" class="btn index_btn03 mt-3">查看更多</a>
                </div>
            </div>
            <div class="col text-center mt-3">
                <div class="card index_box03">
                    <img src="./images/Attractions/台南美術館2館01.jpg" class="card-img-top" alt="picture">
                </div>
                <div class="card-body my-3">
                    <h4 class="card-title">【景點推薦】</h4>
                    <a href="./attractions.php" class="btn index_btn03 mt-3">查看更多</a>
                </div>
            </div>
            <div class="col text-center mt-3">
                <div class="card index_box03">
                    <img src="./images/Food/阿輝炒鱔魚01.jpg" class="card-img-top" alt="picture">
                </div>
                <div class="card-body my-3">
                    <h4 class="card-title">【台南好味道】</h4>
                    <a href="./food_detail.php" class="btn index_btn03 mt-3">查看更多</a>
                </div>
            </div>
            <div class="col text-center mt-3">
                <div class="card index_box03">
                    <img src="./images/HandGift/大師兄手工蛋捲01.jpg" class="card-img-top" alt="picture">
                </div>
                <div class="card-body my-3">
                    <h4 class="card-title">【精選伴手禮】</h4>
                    <a href="./hand_gift.php" class="btn index_btn03 mt-3">查看更多</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- *********** section04 (我們的據點) ********** -->
<section id="s04">
    <div class="container">
        <div class="row my-4">
            <div class="col-md-7">
                <iframe class="my-4"
                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14690.90562831913!2d120.2129832!3d22.9970861!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e768cf38caa09%3A0xc3e9a28e4fd2ac46!2z5Y-w5Y2X6LuK56uZ!5e0!3m2!1szh-TW!2stw!4v1732780747822!5m2!1szh-TW!2stw"
                    width="100%" height="350px" style="border:3px solid var(--color29);border-radius: 5%;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>
            </div>
            <div class="col-md-5">
                <div class="text-start my-4 fs-3" style="color:var(--color29);"><i class="fa-solid fa-location-dot me-3 wow animate__heartBeat"
                        data-wow-duration="1s" data-wow-delay="0s" data-wow-iteration="infinite"></i><span>我們的位置</span></div>
                <div>
                    <p class="fs-5 mt-3" style="color:var(--color29);">
                        我們位於台南市中心，地理位置便利，無論是火車站、主要景點，或是熱門商圈都近在咫尺。
                        歡迎到我們的門市選擇最適合您的機車，展開一段輕鬆自在的台南之旅！
                    </p>
                    <ul class="fs-5 mt-3" style="color:var(--color29); list-style-type: none;">
                        <li>地址：台南市中西區中正路123號</li>
                        <li>營業時間：上午9:00 - 晚上9:00（全年無休）</li>
                        <li>聯絡電話：06-123-4567</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>


<?php include_once('footer.php'); ?>