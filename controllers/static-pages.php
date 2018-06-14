<?php
    if (!isset($_GET["spage"]))
        require ("views/404.html");

    $query = $dbh->prepare("SELECT * FROM static_pages WHERE page_url = :spage");
    $query->bindParam(":spage", $_GET["spage"]);
    $query->execute();
    $page = $query->fetch(PDO::FETCH_ASSOC);

    if (!isset($page["id"]))
    {
        require ("views/404.html");
        exit;
    }

    $title = $page["name"];
    $active_page = $page["page_url"];
    $static_pages = ($dbh->query("SELECT * FROM static_pages")->fetchALL(PDO::FETCH_ASSOC));
    $cities = ($dbh->query("SELECT DISTINCT city FROM tiffin_centers"))->fetchAll(PDO::FETCH_ASSOC);

    require (__DIR__."/../views/header.php");
    echo $page["page"];
    require (__DIR__."/../views/footer.php");
?>
