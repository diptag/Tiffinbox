<?php
    session_start();

    require ("./constants.php");
    require("./includes/helpers.php");
    require ("./db-config.php");

    $_GET["url"] = $_GET["url"] ?? "home";

    if (file_exists("./controllers/".$_GET["url"].".php"))
        require("./controllers/".$_GET["url"].".php");
    else
        require ("views/404.html");
?>
