<?php
    session_start();

    require ("./constants.php");
    require("./includes/helpers.php");
    require ("./db-config.php");

    $page = $_GET["url"] ?? "home";

    //$tiffin_center_pages = ["dashboard", "menus", "add-menu", "orders", "logout"];
    //$consumer_pages = ["home", "static-pages", "testimonials", "tiffin-center-details", "logout"];
    //$guest_pages = ["home", "static-pages", "tiffin-center-details", "tiffin-center-login", "user-login", "register-user"];

    //if (in_array($page, $tiffin_center_pages) && (!isset($_SERVER["user_type"]) || $_SERVER["user_type"] != "Tiffin Center"))
        //redirect ("tiffin-center-login");
    //else if (isset($_SERVER["user_type"]))
    //{
        //if ($_SERVER["user_type"] == "Consumer" && !in_array($page, $consumer_pages))
            //redirect ("user-login");
        //else if ($_SERVER["user_type"] == "Tiffin Center" && !in_array($page, $tiffin_center_pages))
            //redirect ("tiffin-center-login");
    //}
    //else if (!isset($_SERVER["user_type"]) && !in_array($page, $guest_pages))
        //redirect ("home");

    if (file_exists("./controllers/".$page.".php"))
        require("./controllers/".$page.".php");
    else
        require ("views/404.html");
?>
