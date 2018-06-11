<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        render ("static-page-form", ["title" => "Add Static Page", "active_page" => "staticpages", "form_action" => "add-static-page", "heading" => "Add New Static Page"]);
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_POST["sp_name"] = htmlspecialchars(trim($_POST["sp_name"]));
        if (!isset($_POST["sp_name"]) || strlen($_POST["sp_name"]) < 3)
            $error_msg = "Page Name is too short!";
        elseif (!isset($_POST["sp_page_content"]) || empty ($_POST["sp_page_content"]))
            $error_msg = "Empty pages not allowed!";

        if (isset($error_msg))
            render ("static-page-form", ["title" => "Add Static Page", "active_page" => "staticpages", "form_action" => "add-static-page", "heading" => "Add New Static Page", "error_msg" => $error_msg]);

        $stmt = $dbh->prepare("INSERT INTO `static_pages`(`name`, `date_added`, `page`) VALUES (:name, UNIX_TIMESTAMP(), :page)");
        $stmt->bindParam(":name", $_POST["sp_name"]);
        $stmt->bindParam(":page", $_POST["sp_page_content"]);
        $stmt->execute();

        redirect ("staticpages");
    }
?>
