<?php
    $dw = date("w", time());
    $dw = $dw == 0 ? 7 : $dw;
    $curDate = date("M d, Y", time());
    $startDate = date("M d, Y", time() - ($dw - 1) * 24 * 60 * 60);
    //$query = $dbh->query("SELECT COUNT(id) AS numOrders, FROM_UNIXTIME(date_time, '%Y-%m-%d') AS date FROM orders GROUP BY date DESC LIMIT ".$dw);
    //$this_week_results = $query->fetchAll(PDO::FETCH_ASSOC);

    //$query = $dbh->query("SELECT COUNT(id) AS numOrders, FROM_UNIXTIME(date_time, '%Y-%m-%d') AS date FROM orders GROUP BY date DESC LIMIT ".$dw.", 7");
    //$last_week_results = $query->fetchAll(PDO::FETCH_ASSOC);
    //$last_week_orders = array();
    //$last_week_orders = array();
    //foreach($last_week_results as $last_week_result)
        //$last_week_orders[] = intval($last_week_result["numOrders"]);
    //foreach($this_week_results as $this_week_result)
        //$this_week_orders[] = intval($this_week_result["numOrders"]);
    $last_week_orders = [54, 23, 34, 42, 33, 46, 36];
    $this_week_orders = [57, 44, 22, 45, 23];

    $this_week = ($dbh->query("SELECT COUNT(orders.id) AS total_orders, SUM(payments.amount) AS total_amount FROM orders INNER JOIN payments ON payments.id = orders.payment_id WHERE date_time BETWEEN (UNIX_TIMESTAMP() - 7*24*60*60) AND UNIX_TIMESTAMP()"))->fetch(PDO::FETCH_ASSOC);
    $last_week = ($dbh->query("SELECT COUNT(orders.id) AS total_orders, SUM(payments.amount) AS total_amount FROM orders INNER JOIN payments ON payments.id = orders.payment_id WHERE date_time BETWEEN (UNIX_TIMESTAMP() - 14*24*60*60) AND (UNIX_TIMESTAMP() - 7*24*60*60)"))->fetch(PDO::FETCH_ASSOC);

    $this_month = ($dbh->query("SELECT SUM(payments.amount) AS total_amount, FROM_UNIXTIME(orders.date_time, '%Y-%m-%d') AS date FROM orders INNER JOIN payments ON payments.id = orders.payment_id WHERE date_time BETWEEN (UNIX_TIMESTAMP() - 30*24*60*60) AND UNIX_TIMESTAMP()"))->fetch(PDO::FETCH_ASSOC);
    $last_month = ($dbh->query("SELECT SUM(payments.amount) AS total_amount, FROM_UNIXTIME(orders.date_time, '%Y-%m-%d') AS date FROM orders INNER JOIN payments ON payments.id = orders.payment_id WHERE date_time BETWEEN (UNIX_TIMESTAMP() - 60*24*60*60) AND (UNIX_TIMESTAMP() - 30*24*60*60)"))->fetch(PDO::FETCH_ASSOC);

    $query = $dbh->query("SELECT *, tiffin_centers.name as tiffin_center_name, menus.menu as menu, payments.amount as amount, FROM_UNIXTIME(orders.date_time, '%D %b, %Y %H:%i:%s') AS date FROM orders INNER JOIN tiffin_centers on tiffin_centers.id = orders.tiffin_center_id INNER JOIN menus on menus.id = orders.menu_id INNER JOIN payments on payments.id = orders.payment_id ORDER BY orders.date_time DESC, orders.id DESC LIMIT 5");
    $recent_orders = $query->fetchAll(PDO::FETCH_ASSOC);

    render ("dashboard-view", ["title" => "Dashboard", "active_page" => "dashboard", "startDate" => $startDate, "curDate" => $curDate, "recent_orders" => $recent_orders, "this_week_orders" => $this_week_orders, "last_week_orders" => $last_week_orders, "this_week" => $this_week, "last_week" => $last_week, "this_month" => $this_month, "last_month" => $last_month]);
?>
