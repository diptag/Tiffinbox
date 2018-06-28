        <!--carousel-->
        <div id="myCarousel" class="carousel slide banner" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active"> <img src="assets/images/Home/banner3.png" style="width:100%" alt="First slide">
                    <div class="carousel-caption">
                        <div class="carousel-caption-inner">
                            <h1>We Ensure our Customers of High Quality Meals Provided By Our Partners</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>

        <section class="top-tiffin-centers">
            <div class="container">
                <div class="text-head add-top-space">
                    <h1>Today's Top Menus</h1>
                </div>
                <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger">
                    <?= $error_msg ?>
                </div>
                <?php endif; ?>
                <div class="height-135"></div>
                <div id="top-menus">
                </div>
                <div id="menus-pagination" style="display: flex; justify-content: center;"></div>
            </div>
        </section>

        <script>
            $(function () {
                $('#top-menus').load('home', {'page': 1});
                $('#menus-pagination').bootpag({
                    total: <?= $total_tiffin_centers ?>,
                    page: 1,
                    maxVisible: 5,
                }).on('page', function (event, num) {
                    $('#top-menus').load('home', {'page': num});
                });
            });
        </script>

          <section class="service-block">
            <div class="container">
                <div class="text-head add-top-space">
                    <h1>customer feedback</h1>
                </div>
                <div class="height-135"></div>
                <div class="set-border-left">
                    <div data-ride="carousel" class="carousel slide" id="myCarousel4">
                        <div class="carousel-inner">
                        <?php for ($i = 0; $i < 3; $i++): ?>
                            <div class="item <?php if ($i == 0) echo "active" ?>">
                                <div class="feedback-content">
                                    <div class="feedback-box">
                                        <p><?= $testimonials[$i]["testimonial"] ?></p>
                                    </div>
                                    <div class="feedback-title"><a><i class="fa fa-user"></i></a><span><?= $testimonials[$i]["consumer_name"]." @ ".$testimonials[$i]["tiffin_center_name"] ?></span></div>
                                </div>
                            </div>
                        <?php endfor; ?>
                        </div>
                        <a data-slide="prev" href="#myCarousel4" class="left carousel-control"> <img alt="left" onmouseout="this.src = 'assets/images/icons/left.png'" onmouseover="this.src = 'assets/images/icons/left-hover.png'" src="assets/images/icons/left.png"></a>
                        <a data-slide="next" href="#myCarousel4" class="right carousel-control"><img alt="left" onmouseout="this.src = 'assets/images/icons/right.png'" onmouseover="this.src = 'assets/images/icons/right-hover.png'" src="assets/images/icons/right.png"></a>
                    </div>
                    <div class="black-line"><hr/></div>
                    <div data-ride="carousel" class="carousel slide" id="myCarousel5">
                        <div class="carousel-inner">
                        <?php for ($i = 3; $i < 6; $i++): ?>
                            <div class="item <?php if ($i == 3) echo "active" ?>">
                                <div class="feedback-content">
                                    <div class="feedback-box">
                                        <p><?= $testimonials[$i]["testimonial"] ?></p>
                                    </div>
                                    <div class="feedback-title"><a><i class="fa fa-user"></i></a><span><?= $testimonials[$i]["consumer_name"]." @ ".$testimonials[$i]["tiffin_center_name"] ?></span></div>
                                </div>
                            </div>
                        <?php endfor; ?>
                        </div>
                            <a data-slide="prev" href="#myCarousel5" class="left carousel-control"> <img alt="left" onmouseout="this.src = 'assets/images/icons/left.png'" onmouseover="this.src = 'assets/images/icons/left-hover.png'" src="assets/images/icons/left.png"></a>
                            <a data-slide="next" href="#myCarousel5" class="right carousel-control"><img alt="left" onmouseout="this.src = 'assets/images/icons/right.png'" onmouseover="this.src = 'assets/images/icons/right-hover.png'" src="assets/images/icons/right.png"></a>
                    </div>
                </div>
        </section>
