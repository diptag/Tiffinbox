        <!--footer-->
        <footer>
            <div class="container">
                <div class="row footer-block-main">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 width-50">
                        <div class="footer-block"><h4>quick links</h4>
                            <ul class="list-unstyled">
                                <li class="active"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="menu.html">menu</a></li>
                                <li><a href="service.html">service</a></li>
                                <li> <a href="event.html">Events</a></li>
                                <li> <a href="contact.html">Contact us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 width-50">
                        <div class="footer-block"><h4>working hours</h4>
                            <ul class="list-unstyled">
                                <li><p>week days : 08:00-22:00</p></li>
                                <li><p>saturday : 08:00-22:00</p></li>
                                <li><p>sunday : 08:00-22:00</p></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
                        <div class="footer-block margin-t15"><h4>now on instagram</h4>
                            <div class="row">
                                <div id="instafeed"></div>


                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <hr/>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <div class="social-grid text-right">
                            <ul>
                                <li><a><i class="fa fa-facebook"></i></a></li>
                                <li><a><i class="fa fa-twitter"></i></a></li>
                                <li><a><i class="fa fa-instagram"></i></a></li>
                                <li><a><i class="fa fa-google-plus"></i></a></li>
                                <li><a><i class="fa fa-youtube-play"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright">
                            © 2017 All right reserved. Designed by <a href="http://www.themevault.net/" target="_blank">ThemeVault.</a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--end-->

        <!--back to top--->
        <a id="back-to-top" class="scrollTop back-to-top" href="javascript:void(0);" style="display: none;">
            <img src="assets/images/top-arrow.png" onmouseover="this.src = 'assets/images/top-arrow2.png'" onmouseout="this.src = 'assets/images/top-arrow.png'" alt="left">
        </a>
        <!--end--->

        <script>
            jQuery(document).ready(function ($) {
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });
            });
        </script>
        <script>
            $(function () {
                $('.pop').on('click', function () {
                    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                    $('#imagemodal').modal('show');
                });
            });
        </script>
    </body>
</html>
