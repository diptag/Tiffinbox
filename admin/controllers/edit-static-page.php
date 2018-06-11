<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (!isset($_GET["action"]))
            redirect ("staticpages");

        $query = $dbh->prepare("SELECT * FROM static_pages WHERE id = :id");
        $query->bindParam(":id", $_GET["sp_id"]);
        $query->execute();
        $static_page = $query->fetch(PDO::FETCH_ASSOC);
        if (count($static_page) == 0)
            redirect ("staticpages");

        if ($_GET["action"] == "edit")
        {
            $dict = ["title" => "Edit Static Page", "acitve_page" => "staticpages", "sp_id" => $static_page["id"], "sp_name" => $static_page["name"], "sp_page_content" => $static_page["page"], "form_action" => "edit-static-page", "heading" => "Edit Static Page"];
            render ("static-page-form", $dict);
        }
        elseif ($_GET["action"] == "remove")
        {
            $stmt = $dbh->prepare("DELETE FROM static_pages WHERE id = :id");
            $stmt->bindParam(":id", $static_page["id"]);
            $stmt->execute();

            redirect ("staticpages");
        }
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $stmt = $dbh->prepare("UPDATE static_pages SET name = :name, page = :page WHERE id = :id");
        $stmt->bindParam(":name", $_POST["sp_name"]);
        $stmt->bindParam(":page", $_POST["sp_page_content"]);
        $stmt->bindParam(":id", $_POST["sp_id"]);
        $stmt->execute();
        redirect ("staticpages");
    }
?>
