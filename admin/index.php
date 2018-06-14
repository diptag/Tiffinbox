<?php
    session_start();

    require ("../constants.php");
    require ("./includes/helpers.php");
    require ("./../db-config.php");

    if (WEBSITE_MODE == "development")
    {
        error_reporting(E_ALL);
        ini_set('display_errors',1);
    }

    $_GET["url"] = $_GET["url"] ?? "login";

    if (!isset($_SESSION["user_id"]) && $_GET["url"] != "login")
        render_login ("You Need To Login First!");
    else if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] != "admin" && $_GET["url"] != "login")
            render_login ("Invalid Username or Password!");
    else if (isset($_SESSION["user_id"]) && $_SESSION["user_type"] == "admin" && $_GET["url"] == "login")
        redirect ("dashboard");

    $path = "./controllers/".$_GET["url"].".php";
    if (file_exists($path))
        require ($path);
    else
        echo "404 Not Found!<br>";

?>
