<?php
    $query = $dbh->query("SELECT * FROM plans");
    $plans = $query->fetchAll(PDO::FETCH_ASSOC);

    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        if (!isset($_GET["action"]) || empty($_GET["action"]))
            redirect ("tiffin-center-form");

        if ($_GET["action"] == "edit")
        {
            if (!isset($_GET["tc-id"]) || empty($_GET["tc-id"]))
                redirect ("tiffin-center-form");

            $query = $dbh->prepare("SELECT * FROM tiffin_centers WHERE id = :id");
            $query->bindParam(":id", $_GET["tc-id"], PDO::PARAM_INT);
            $query->execute();
            $tiffin_center = $query->fetch(PDO::FETCH_ASSOC);

            if (count($tiffin_center) == 0)
                render ("tiffin-center-form", ["title" => "Edit Tiffin Center", "active_page" => "tiffincenters", "form_action" => "add-tiffin-center", "plans" => $plans, "error_msg" => "Couldn't Find the Tiffin Center!"]);
            else
                render ("tiffin-center-form", ["title" => "Edit Tiffin Center", "active_page" => "tiffincenters", "form_action" => "edit-tiffin-center", "plans" => $plans, "tiffin_center" => $tiffin_center]);
        }
        else if ($_GET["action"] == "remove")
        {
            if (!isset($_GET["tc-id"]) || empty($_GET["tc-id"]))
                redirect ("tiffincenters");

            $stmt = $dbh->prepare ("DELETE FROM tiffin_centers WHERE id = :id");
            $stmt->bindParam(":id", $_GET["tc-id"], PDO::PARAM_INT);
            if ($stmt->execute())
                redirect ("tiffincenters");
            else
                render ("tiffincenters", ["title" => "Tiffin Centers", "active_page" => "tiffincenters", "error_msg" => "Couldn't Find Tiffin Center!"]);
        }
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require (__DIR__."/tiffin-center-validate.php");


        $stmt = $dbh->prepare("UPDATE tiffin_centers SET name = :name, address = :address, email = :email,  contact_no = :contact_no, city = :city, state = :state, plan_id = :plan, overview = :overview WHERE id = :id");
        $stmt->bindParam(":name", $_POST["tc_name"]);
        $stmt->bindParam(":address", $_POST["tc_address"]);
        $stmt->bindParam(":email", $_POST["tc_email"]);
        $stmt->bindParam(":contact_no", $_POST["tc_contact"]);
        $stmt->bindParam(":city", $_POST["tc_city"]);
        $stmt->bindParam(":state", $_POST["tc_state"]);
        $stmt->bindParam(":plan", $_POST["tc_plan"], PDO::PARAM_INT);
        $stmt->bindParam(":overview", $_POST["tc_overview"]);
        $stmt->bindParam(":id", $_POST["tc_id"]);

        if ($stmt->execute())
            redirect ("tiffincenters");
        else
                render ("tiffin-center-form", ["title" => "Edit Tiffin Center", "active_page" => "tiffincenters", "form_action" => "add-tiffin-center", "plans" => $plans, "error_msg" => "Couldn't update Tiffin Center!"]);
    }
?>
