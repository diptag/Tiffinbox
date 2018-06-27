<?php
    tiffinCenterCheck();
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_GET["activate"]) || isset($_GET["deactivate"]))
        {
            if (isset($_GET["activate"])) {
                $status = "Active";
                $id = $_GET["activate"];
            } else {
                $status = "Inactive";
                $id = $_GET["deactivate"];
            }
            $stmt = $dbh->prepare("UPDATE menus SET status = '$status' WHERE id = :id");
            $stmt->bindParam("id", $id);
            $stmt->execute();
            redirect ("menus");
        }
        render ("menus-view", ["title" => "Menus", "active_page" => "menus"]);
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql = "SELECT id as menuId, FROM_UNIXTIME(date, '%d %b, %Y %H:%i:%s') AS 'datetime', menu, price, status FROM menus WHERE tiffin_center_id = ".intval($_SESSION["user_id"]);
        $tableColumns = ["id", "date", "menu", "price", "status"];

        dataTablesAJAX ($sql, "menus", $tableColumns);
    }
?>
