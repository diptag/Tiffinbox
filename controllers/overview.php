<?php
    tiffinCenterCheck();
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $result = ($dbh->query("SELECT overview, image FROM tiffin_centers WHERE id = ".intval($_SESSION["user_id"])))->fetch(PDO::FETCH_ASSOC);
        if (!$result)
            render ("overview-view", ["title" => "Overview", "active_page" => "Overview", "error_msg" => "Couldn't Connect find Tiffin Center!"]);
        render ("overview-view", ["title" => "Overview", "active_page" => "Overview", "tiffin_center" => $result]);
    }
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!isset($_POST["overview"]))
            render ("overview-view", ["title" => "Overview", "active_page" => "Overview", "error_msg" => "Empty Overview!"]);

        if (!isset($_FILES['image_upload']) || $_FILES['image_upload']['error'] == UPLOAD_ERR_NO_FILE)
            $stmt = $dbh->prepare("UPDATE tiffin_centers SET overview = :overview WHERE id = ".intval($_SESSION["user_id"]));
        else if (isset($_FILES['image_upload']) && $_FILES['image_upload']['error'] == UPLOAD_ERR_OK)
        {
            $allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG, IMAGETYPE_GIF);
            $detectedType = exif_imagetype($_FILES["image_upload"]["tmp_name"]);
            if (!in_array($detectedType, $allowedTypes))
                $error_msg = "Unsupported Image Type!";
            else if ($_FILES["image_upload"]["size"] > 1024000)
                $error_msg = "Image size should be less than 512 kb.";

            $img_dir = __DIR__."/../static/img/tiffin_centers/";
            $img_pathinfo = pathinfo ($_FILES["image_upload"]["name"]);
            $timestamp = time();
            $img_name = $img_pathinfo["filename"].'-'.$timestamp.'.'.$img_pathinfo["extension"];

            if (isset($error_msg))
                render ("overview-view", ["title" => "Overview", "active_page" => "Overview", "error_msg" => $error_msg]);

            if (move_uploaded_file($_FILES["image_upload"]["tmp_name"], $img_dir.$img_name))
            {
                $stmt = $dbh->prepare("UPDATE tiffin_centers SET overview = :overview, image = :image WHERE id = ".intval($_SESSION["user_id"]));
                $isImage = true;
            }
            else
                render ("overview-view", ["title" => "Overview", "active_page" => "Overview", "error_msg" => "Couldn't Upload Image"]);
        }

        $stmt->bindParam(":overview", $_POST["overview"]);
        if ($isImage)
            $stmt->bindParam(":image", $img_name);
        if($stmt->execute())
            redirect ("overview");
        else
            render ("overview-view", ["title" => "Overview", "active_page" => "Overview", "error_msg" => "Couldnt' Update Overview!"]);
    }
?>
