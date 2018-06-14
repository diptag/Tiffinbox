<?php
    $cities = ($dbh->query("SELECT DISTINCT city FROM tiffin_centers"))->fetchAll(PDO::FETCH_ASSOC);
    if (isset($_GET["user_city"]))
    {
        $_SESSION["user_city"] = htmlspecialchars($_GET["user_city"]);
        $query = $dbh->prepare("SELECT COUNT(tiffin_centers.id) AS total_tiffin_centers FROM tiffin_centers
            INNER JOIN plans ON plans.id = tiffin_centers.plan_id
            WHERE (tiffin_centers.added_date + plans.validity * 24 * 60 * 60 > UNIX_TIMESTAMP()) AND tiffin_centers.city = :city");
        $query->bindParam(":city", $_GET["user_city"]);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        render ("home", ["title" => "Home", "active_page" => "home", "total_tiffin_centers" => $result["total_tiffin_centers"], "cities" => $cities]);
    }
    else
    {
        render ("home", ["title" => "Home", "active_page" => "home", "cities" => $cities]);
    }
?>
