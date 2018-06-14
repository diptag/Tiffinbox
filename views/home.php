        <div id="city-modal" class="modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-footer" style="text-align: left;">
                        <h3>Enter Your Location</h3>
                    </div>
                    <form action="/home" method="GET">
                        <div class="modal-body" style="font-size: 16px;">
                            <label for="user-city">Select City: &nbsp;&nbsp;</label>
                            <select name="user_city" id="user-city" style="width: 40%;">
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?= $city["city"] ?>"><?= $city["city"] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <?php if (isset($_SESSION["user_city"])): ?>
                            <button class="btn btn-primary" type="button" data-dismiss="modal">Close</button>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary">Save City</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php if (!isset($_SESSION["user_city"])): ?>
        <script>
            $(function () {
                $('#city-modal').modal('show');
            });
        </script>
        <?php endif; ?>

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
                            <div class="item active">
                                <div class="feedback-content">
                                    <div class="feedback-box">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa loremi psum dolor sitamet, consectetuer adipiscing elit aenean commodo ligula eget do an massa consectetuer adipiscing elit</p>
                                    </div>
                                    <div class="feedback-title"><a><i class="fa fa-user"></i></a><span>DAVID WARNER</span></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="feedback-content">
                                    <div class="feedback-box">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa loremi psum dolor sitamet, consectetuer adipiscing elit aenean commodo ligula eget do an massa consectetuer adipiscing elit</p>
                                    </div>
                                    <div class="feedback-title"><a><i class="fa fa-user"></i></a><span>DAVID WARNER</span></div>
                                </div>
                            </div>

                        </div>
                        <a data-slide="prev" href="#myCarousel4" class="left carousel-control"> <img alt="left" onmouseout="this.src = 'assets/images/icons/left.png'" onmouseover="this.src = 'assets/images/icons/left-hover.png'" src="assets/images/icons/left.png"></a>
                        <a data-slide="next" href="#myCarousel4" class="right carousel-control"><img alt="left" onmouseout="this.src = 'assets/images/icons/right.png'" onmouseover="this.src = 'assets/images/icons/right-hover.png'" src="assets/images/icons/right.png"></a>
                    </div>
                    <div class="black-line"><hr/></div>
                    <div data-ride="carousel" class="carousel slide" id="myCarousel5">
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="feedback-content">
                                    <div class="feedback-box">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa loremi psum dolor sitamet, consectetuer adipiscing elit aenean commodo ligula eget do an massa consectetuer adipiscing elit</p>
                                    </div>
                                    <div class="feedback-title"><a><i class="fa fa-user"></i></a><span>DAVID WARNER</span></div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="feedback-content">
                                    <div class="feedback-box">
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa loremi psum dolor sitamet, consectetuer adipiscing elit aenean commodo ligula eget do an massa consectetuer adipiscing elit</p>
                                    </div>
                                    <div class="feedback-title"><a><i class="fa fa-user"></i></a><span>DAVID WARNER</span></div>
                                </div>
                            </div>
                            <a data-slide="prev" href="#myCarousel5" class="left carousel-control"> <img alt="left" onmouseout="this.src = 'assets/images/icons/left.png'" onmouseover="this.src = 'assets/images/icons/left-hover.png'" src="assets/images/icons/left.png"></a>
                            <a data-slide="next" href="#myCarousel5" class="right carousel-control"><img alt="left" onmouseout="this.src = 'assets/images/icons/right.png'" onmouseover="this.src = 'assets/images/icons/right-hover.png'" src="assets/images/icons/right.png"></a>
                        </div>
                    </div>
                </div>
        </section>
