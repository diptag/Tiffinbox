<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_GET["completed"]))
        {
            $stmt = $dbh->prepare("UPDATE orders SET status = 'Completed' WHERE id = :id");
            $stmt->bindParam(":id", $_GET["completed"]);
            $stmt->execute();
            redirect ("orders");
        }
        render ("orders-view", ["title" => "Orders", "active_page" => "orders"]);
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql = "SELECT orders.id AS 'orderId', consumers.name AS 'consumerName', tiffin_centers.name AS 'tiffinCenterName', menus.menu AS 'menu', payments.amount AS 'amount', orders.payment_id AS 'paymentId', tiffin_centers.city AS 'city', FROM_UNIXTIME(orders.date_time, '%d %b, %Y %H:%i:%s') AS 'datetime', orders.status AS 'status' FROM orders INNER JOIN tiffin_centers ON tiffin_centers.id = orders.tiffin_center_id INNER JOIN menus ON menus.id = orders.menu_id INNER JOIN payments ON payments.id = orders.payment_id INNER JOIN consumers ON consumers.id = orders.consumer_id WHERE orders.tiffin_center_id = ".intval($_SESSION["user_id"]);

        $tableColumns = ["orders.id", "consumers.name", "tiffin_centers.name", "menus.menu", "payments.amount", "orders.payment_id", "tiffin_centers.city", "orders.date_time", "orders.status"];

        dataTablesAJAX ($sql, 'orders', $tableColumns);
    }
?>
