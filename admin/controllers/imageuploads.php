<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (isset($_GET["action"]) && $_GET["action"] == "remove" && isset($_GET["img_id"]) && !empty($_GET["img_id"]))
        {
            $num_images = (int)($dbh->query("SELECT COUNT(*) FROM images"))->Fetch();
            $num_pages = ceil($num_images/PAGE_LIMIT);

            $query = $dbh->prepare("SELECT * FROM images WHERE id = :id");
            $query->bindParam(":id", $_GET["img_id"]);
            $query->execute();

            if (!($result = $query->fetch(PDO::FETCH_ASSOC)))
                redirect ("imageuploads");

            $stmt = $dbh->query("DELETE FROM images WHERE id = ".$result["id"]);
            if (!$stmt->execute())
                redirect ("imageuploads");

            unlink("..".STATIC_IMG_DIR.$result["file_name"]);
            render ("image-uploads-view", ["title" => "Image Uploads", "active_page" => "imageuploads", "num_pages" => $num_pages]);
        }
        else if (!isset($_GET["page"]))
        {
            $num_images = (int)($dbh->query("SELECT COUNT(*) FROM images"))->Fetch();
            $num_pages = ceil($num_images/PAGE_LIMIT);
            render ("image-uploads-view", ["title" => "Image Uploads", "active_page" => "imageuploads", "num_pages" => $num_pages]);
        }
        else
        {
            if (empty($_GET["page"]))
                $_GET["page"] = 1;

            $query = $dbh->prepare ("SELECT * FROM images LIMIT :start, ".PAGE_LIMIT);
            $page_start = ((int)$_GET["page"] - 1) * PAGE_LIMIT;
            $query->bindParam(":start", $page_start, PDO::PARAM_INT);
            $query->execute();
            $images = $query->FetchAll(PDO::FETCH_ASSOC);
            render_only ("image-uploads-viewer", ["images" => $images]);
        }
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
        $detectedType = exif_imagetype($_FILES["image_upload"]["tmp_name"]);
        if (!in_array($detectedType, $allowedTypes))
        {
            render ("image-uploads-view", ["title" => "Image Uploads", "active_page" => "imageuploads", "error_msg" => "Unsupported Image Type"]);
            exit;
        }

        $img_dir = __DIR__."/../../static/img/";
        $img_pathinfo = pathinfo ($_FILES["image_upload"]["name"]);
        $timestamp = time();
        $img_name = $img_pathinfo["filename"].'-'.$timestamp.'.'.$img_pathinfo["extension"];

        $stmt = $dbh->prepare("SELECT * FROM images WHERE `file_name` = :img_name");
        $stmt->bindParam(":img_name", $img_name);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($results) > 0)
        {
            render ("image-uploads-view", ["title" => "Image Uploads", "active_page" => "imageuploads", "error_msg" => "Image Name already Exists!"]);
            exit;
        }

        if (move_uploaded_file($_FILES["image_upload"]["tmp_name"], $img_dir.$img_name))
        {
            $stmt = $dbh->prepare("INSERT INTO images (`date_added`, `file_name`, `description`) VALUES (CURDATE(), :file, :description)");
            $stmt->bindParam(":file", $img_name);
            $stmt->bindParam(":description", $_POST["image_description"]);
            $stmt->execute();

            redirect ("imageuploads");
        }
        else
        {
            render ("image-uploads-view", ["title" => "Image Uploads", "active_page" => "imageuploads", "error_msg" => "Couldn't Upload Image"]);
            exit;
        }
    }
?>
