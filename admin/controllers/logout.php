<?php
    $_SESSION = [];
    session_destroy();

    render_login ("You Have Succesfully Logged Out!");
?>
