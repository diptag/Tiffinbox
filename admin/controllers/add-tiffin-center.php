<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $query = $dbh->query("SELECT * FROM plans");
        $plans = $query->FetchAll(PDO::FETCH_ASSOC);
        render ("tiffin-center-form", ["title" => "Add Tiffin Center", "active_page" => "tiffincenters", "form_action" => "add-tiffin-center", "plans" => $plans]);
    }
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require (__DIR__."/tiffin-center-validate.php");
        if (empty($_POST["tc_password"]) || strlen($_POST["tc_password"]) < 8)
            $error_msg = "Password is too Short!";
        elseif ($_POST["tc_password"] !== $_POST["tc_retype_password"])
            $error_msg = "Passwords do not Match!";

        $query = $dbh->query("SELECT * FROM plans");
        $plans = $query->FetchAll(PDO::FETCH_ASSOC);
        if (isset($error_msg))
            render ("tiffin-center-form", ["title" => "Add Tiffin Center", "active_page" => "tiffincenters", "form_action" => "add-tiffin-center", "plans" => $plans, "error_msg" => $error_msg]);

        $stmt = $dbh->prepare("INSERT INTO `tiffin_centers`(`name`, `address`, `email`, `contact_no`, `city`, `state`, `added_date`, `plan_id`, `overview`, `password_hash`) ".
            "VALUES (:name, :address, :email, :contact_no, :city, :state, UNIX_TIMESTAMP(), :plan, :overview, :password_hash)");
        $stmt->bindParam(":name", $_POST["tc_name"]);
        $stmt->bindParam(":address", $_POST["tc_address"]);
        $stmt->bindParam(":email", $_POST["tc_email"]);
        $stmt->bindParam(":contact_no", $_POST["tc_contact"]);
        $stmt->bindParam(":city", $_POST["tc_city"]);
        $stmt->bindParam(":state", $_POST["tc_state"]);
        $stmt->bindParam(":plan", $_POST["tc_plan"], PDO::PARAM_INT);
        $stmt->bindParam(":overview", $_POST["tc_overview"]);
        $stmt->bindParam(":password_hash", password_hash($_POST["tc_password"], PASSWORD_DEFAULT));

        $status = $stmt->execute();
        if ($status)
            redirect ("tiffincenters");
        else
            render ("tiffin-center-form", ["title" => "Add Tiffin Center", "active_page" => "tiffincenters", "form_action" => "add-tiffin-center", "plans" => $plans, "error_msg" => "Couldn't Register User!"]);
    }
?>
