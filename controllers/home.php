<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $testimonials = ($dbh->query("SELECT testimonials.*, tiffin_centers.name AS tiffin_center_name, consumers.name AS consumer_name FROM testimonials INNER JOIN tiffin_centers ON tiffin_centers.id = testimonials.tiffin_center_id INNER JOIN consumers ON consumers.id = testimonials.consumer_id WHERE testimonials.rating >= 3.5 ORDER BY RAND() LIMIT 6"))->fetchAll(PDO::FETCH_ASSOC);

        if (isset($_GET["user_city"]))
            $_SESSION["user_city"] = htmlspecialchars($_GET["user_city"]);

        if (isset($_SESSION["user_city"]))
        {
            $total_query = $dbh->prepare("SELECT COUNT(tiffin_centers.id) AS total_tiffin_centers FROM tiffin_centers INNER JOIN plans ON plans.id = tiffin_centers.plan_id INNER JOIN menus ON menus.tiffin_center_id = tiffin_centers.id WHERE (tiffin_centers.added_date + plans.validity * 24 * 60 * 60 > UNIX_TIMESTAMP()) AND tiffin_centers.city = :city AND menus.status = 'Active'");

            $total_query->bindParam(":city", $_SESSION["user_city"]);
            $total_query->execute();
            $result = (int)$total_query->fetch();
            $total_tiffin_centers = intval($result/PAGE_LIMIT) + 1;

            render ("home", ["title" => "Home", "active_page" => "home", "total_tiffin_centers" => $total_tiffin_centers, "testimonials" => $testimonials]);
        }
        else
        {
            render ("home", ["title" => "Home", "active_page" => "home", "testimonials" => $testimonials]);
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["page"]))
    {
        if (!isset($_SESSION["user_city"]))
            redirect ("home");
        if (empty($_POST["page"]) || $_POST["page"] < 1)
            $_POST["page"] = 1;
        $start = PAGE_LIMIT * (intval($_POST["page"]) - 1);
        $query = $dbh->prepare("SELECT tiffin_centers.id, tiffin_centers.name, tiffin_centers.city, tiffin_centers.state, tiffin_centers.image, menus.menu, menus.price FROM tiffin_centers INNER JOIN menus ON menus.tiffin_center_id = tiffin_centers.id INNER JOIN plans ON plans.id = tiffin_centers.plan_id WHERE (tiffin_centers.added_date + plans.validity * 24 * 60 * 60 > UNIX_TIMESTAMP()) AND tiffin_centers.city = :city AND menus.status = 'Active' ORDER BY tiffin_centers.rating LIMIT :start, ".PAGE_LIMIT);
        $query->bindParam(":city", $_SESSION["user_city"]);
        $query->bindParam(":start", $start, PDO::PARAM_INT);
        $query->execute();
        $tiffin_centers = $query->fetchAll(PDO::FETCH_ASSOC);

        render_only("home-pagination", ["tiffin_centers" => $tiffin_centers]);
    }
?>
