<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render ("login-view", ["title" => "User Login", "active_page" => "login", "login_type" =>"User", "form_action" => "user-login"]);
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
        login($dbh, "consumers");
?>
