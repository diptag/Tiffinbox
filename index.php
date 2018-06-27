<?php
    session_start();

    require ("./constants.php");
    require("./includes/helpers.php");
    require ("./db-config.php");

    $page = $_GET["url"] ?? "home";

    if (file_exists("./controllers/".$page.".php"))
        require("./controllers/".$page.".php");
    else
        require ("views/404.html");
?>
