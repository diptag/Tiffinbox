<?php
    tiffinCenterCheck();
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render ("menu-form", ["title" => "Add New Menu", "active_page" => "menus"]);
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["menu"]) || empty($_POST["price"]))
            render ("menu-form", ["title" => "Add New Menu", "active_page" => "menus", "error_msg" => "All Fields are Required!"]);

        $tfid = intval($_SESSION["user_id"]);
        $dbh->query("UPDATE menus SET status = 'Inactive' WHERE tiffin_center_id = $tfid");

        $stmt = $dbh->prepare("INSERT INTO `menus`(`tiffin_center_id`, `date`, `menu`, `price`, `status`) VALUES ($tfid, UNIX_TIMESTAMP(), :menu, :price, 'Active')");
        $stmt->bindParam(":menu", $_POST["menu"]);
        $stmt->bindParam(":price", $_POST["price"]);
        if ($stmt->execute())
            redirect ("menus");
        else
            render ("menu-form", ["title" => "Add New Menu", "active_page" => "menus", "error_msg" => "Unable to Add Menu!"]);
    }
?>
