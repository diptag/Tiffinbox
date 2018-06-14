<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $cities = ($dbh->query("SELECT DISTINCT city FROM tiffin_centers"))->fetchAll(PDO::FETCH_ASSOC);

        if (isset($_GET["user_city"]))
            $_SESSION["user_city"] = htmlspecialchars($_GET["user_city"]);

        if (isset($_SESSION["user_city"]))
        {
            $total_query = $dbh->prepare("SELECT COUNT(tiffin_centers.id) AS total_tiffin_centers FROM tiffin_centers INNER JOIN plans ON plans.id = tiffin_centers.plan_id WHERE (tiffin_centers.added_date + plans.validity * 24 * 60 * 60 > UNIX_TIMESTAMP()) AND tiffin_centers.city = :city");

            $total_query->bindParam(":city", $_SESSION["user_city"]);
            $total_query->execute();
            $result = (int)$total_query->fetch();
            $total_tiffin_centers = intval($result/PAGE_LIMIT) + 1;

            render ("home", ["title" => "Home", "active_page" => "home", "total_tiffin_centers" => $total_tiffin_centers, "cities" => $cities]);
        }
        else
        {
            render ("home", ["title" => "Home", "active_page" => "home", "cities" => $cities]);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["page"]))
    {
        if (!isset($_SESSION["user_city"]))
            redirect ("home");
        if (empty($_POST["page"]) || $_POST["page"] < 1)
            $_POST["page"] = 1;
        $start = PAGE_LIMIT * (intval($_POST["page"]) - 1);
        $query = $dbh->prepare("SELECT tiffin_centers.id, tiffin_centers.name, tiffin_centers.city, tiffin_centers.state, menus.menu, menus.price FROM tiffin_centers INNER JOIN menus ON menus.tiffin_center_id = tiffin_centers.id INNER JOIN plans ON plans.id = tiffin_centers.plan_id WHERE (tiffin_centers.added_date + plans.validity * 24 * 60 * 60 > UNIX_TIMESTAMP()) AND tiffin_centers.city = :city ORDER BY tiffin_centers.rating LIMIT :start, ".PAGE_LIMIT);
        $query->bindParam(":city", $_SESSION["user_city"]);
        $query->bindParam(":start", $start, PDO::PARAM_INT);
        $query->execute();
        $tiffin_centers = $query->fetchAll(PDO::FETCH_ASSOC);

        render_only("home-pagination", ["tiffin_centers" => $tiffin_centers]);
    }
?>
