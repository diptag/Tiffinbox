<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render ("login-view", ["title" => "Tiffin Center Login", "active_page" => "login", "login_type" => "Tiffin Center", "form_action" => "tiffin-center-login"]);
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
        login($dbh, "tiffin_centers");
?>
