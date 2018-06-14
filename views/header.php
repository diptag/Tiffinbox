<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="assets/images/Home/favicon.png"/> <title><?= $title ?></title>

        <!-- Bootstrap core CSS -->
        <link href="assets/fonts/oswald/stylesheet.css" rel="stylesheet"/>
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Custom styles for this template -->
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/responsive.css" rel="stylesheet">
        <script src="assets/js/jquery.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/counterup.min.js" type="text/javascript"></script>
        <script src="assets/js/waypoints.min.js" type="text/javascript"></script>
        <script src="assets/js/instafeed.min.js" type="text/javascript"></script>
        <script src="assets/vendor/jquery-bootpag/lib/jquery.bootpag.min.js" type="text/javascript"></script>
        <script src="assets/js/custom.js" type="text/javascript"></script>

    </head>
    <body>
        <!--header--->
        <header>
            <nav class="navbar navbar-default">
                <div class="row">
                    <div class="col-xs-12 visible-xs">
                        <div class="logo-mobile">
                            <a href="index.html"><img src="assets/images/Home/logo.png"/></a>
                        </div>
                    </div>
                    <div class="col-md-11 col-xs-12">
                        <div class="collapse navbar-collapse text-center" id="myNavbar">
                            <div class="logo hidden-xs navbar-left">
                                <a href="home"><img src="assets/images/Home/logo.png"/></a>
                            </div>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="<?php if ($active_page == "home") echo "active"; ?>"><a href="home">Home</a></li>
                                <?php foreach ($static_pages as $static_page): ?>
                                <li class="<?php if ($active_page == $static_page["page_url"]) echo "active"; ?>"><a href="static-pages?spage=<?= $static_page["page_url"] ?>"><?= $static_page["name"] ?></a></li>
                                <?php endforeach; ?>
                                <?php if (isset($_SESSION["user_city"])): ?>
                                <li><a data-toggle="modal" data-target="#city-modal"><i class="fa fa-map-marker"></i> <?= $_SESSION["user_city"] ?></a></li>
                                <?php endif; ?>
                                <?php if (!isset($_SESSION["user_id"])): ?>
                                <li class="dropdown <?php if ($active_page == "login") echo "active"; ?>">
                                    <a data-toggle="dropdown" class="toggle set-pos">
                                        Login/Register <i class="fa fa-caret-down" aria-hidden="true"></i>
                                    </a>
                                    <div class="dropdown-menu btn-block box-content-menu">
                                        <ul class="menu">
                                            <li><a class="dropdown" href="user-login">User Login</a></li>
                                            <li><a class="dropdown" href="tiffin-center-login">Tiffin Center Login</a></li>
                                            <li><a class="dropdown" href="register-user">Register User</a></li>
                                        </ul>
                                    </div>
                                </li>
                                <?php else: ?>
                                <li><a href="logout">LogOut</a></li>
                                <?php endif; ?>
                            </ul>

                        </div>
                    </div>
                    <div class="col-md-1">
                    </div>
                </div>
            </nav>
            <div class="clearfix"></div>
        </header>
        <!--end-->
