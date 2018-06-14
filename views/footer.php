        <!--footer-->
        <footer>
            <div class="container">
                <hr/>
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright">
                            © 2017 All right reserved. Designed by <a href="http://www.themevault.net/" target="_blank">ThemeVault.</a>
                        </div>
                    </div>
                    <div class="col-md-6">
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
            </div>
        </footer>
        <!--end-->

        <!--back to top-->
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
