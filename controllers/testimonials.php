<?php
    if (!isset($_SESSION["user_id"]))
        redirect ("user-login");
    else if ($_SERVER["REQUEST_METHOD"] == "GET")
        redirect ("home");
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //if (!isset($_POST["rating"]) || !isset($_POST["testimonial"]) || !isset($_POST["tfid"]))
            //$error_msg = "Invalid Input";

        $stmt = $dbh->prepare("SELECT * FROM tiffin_centers WHERE id = :id");
        $stmt->bindParam(":id", $_POST["tfid"], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!isset($result["id"]) || $result["id"] != $_POST["tfid"])
            $error_msg = "Couldn't Find Tiffin Center";

        if (isset($error_msg))
            render ("home", ["title" => "Home", "active_page" => "home", "error_msg" => $error_msg]);

        $overall_rating = number_format(0.9 * floatval($result["rating"]) + 0.1 * floatval($_POST["rating"]), 1, '.', '');
        $stmt = $dbh->prepare("INSERT INTO testimonials (consumer_id, tiffin_center_id, testimonial, rating) VALUES (".intval($_SESSION["user_id"]).", :tfid, :testimonial, :rating)");
        $stmt->bindParam(":tfid", $result["id"]);
        $stmt->bindParam(":testimonial", $_POST["testimonial"]);
        $stmt->bindParam(":rating", $_POST["rating"]);
        $stmt->execute();

        $stmt = $dbh->prepare("UPDATE tiffin_centers SET rating = :rating WHERE id = :id");
        $stmt->bindParam(":rating", $overall_rating);
        $stmt->bindParam(":id", $result["id"], PDO::PARAM_INT);
        $stmt->execute();
        redirect ("home");
    }
?>
