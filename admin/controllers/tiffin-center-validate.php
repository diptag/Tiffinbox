<?php
    validate();

    if (empty($_POST["tc_name"]) || strlen($_POST["tc_name"]) < 3)
        $error_msg = "Invalid Name";
    elseif (empty($_POST["tc_address"]) || strlen ($_POST["tc_address"]) < 6)
        $error_msg = "Invalid Address";
    elseif (empty($_POST["tc_contact"]) || strlen($_POST["tc_contact"]) != 10)
        $error_msg = "Invalid Contact Number";
    elseif (empty($_POST["tc_city"]) || strlen($_POST["tc_city"]) < 3)
        $error_msg = "Invalid City Name";
    elseif (empty($_POST["tc_state"]) || strlen($_POST["tc_state"]) < 3)
        $error_msg = "Invalid State Name";
    elseif (empty($_POST["tc_plan"]))
        $error_msg = "Invalid Plan";
    elseif (empty($_POST["tc_overview"]))
        $error_msg = "Required Overview";
    else
    {
        $query = $dbh->prepare("SELECT * FROM plans WHERE id = :id");
        $query->bindParam(":id", $_POST["tc_plan"], PDO::PARAM_INT);
        $query->execute();
        if (count($query->fetch(PDO::FETCH_ASSOC)) == 0)
            $error_msg = "Invalid Plan";
    }

    if (isset($error_msg))
        render ("tiffin-center-form", ["title" => "Add Tiffin Center", "active_page" => "tiffincenters", "action" => "add-tiffin-center", "plans" => $plans, "error_msg" => $error_msg]);
?>
