<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render ("tiffincenters-view", ["title" => "Tiffin Centers", "active_page" => "tiffincenters"]);
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $sql = "SELECT tiffin_centers.id, tiffin_centers.name, tiffin_centers.address, tiffin_centers.city, tiffin_centers.state, tiffin_centers.email, tiffin_centers.contact_no AS contactNo, FROM_UNIXTIME(tiffin_centers.added_date, '%d %b, %Y') AS dateAdded, plans.name as planName, fROM_UNIXTIME(added_date + plans.validity * 24 * 60 * 60, '%d %b, %Y') AS expiryDate FROM tiffin_centers INNER JOIN plans ON tiffin_centers.plan_id = plans.id";

        $tableColumns = ["tiffin_centers.id", "tiffin_centers.name", "tiffin_centers.address", "tiffin_centers.city", "tiffin_centers.state", "tiffin_centers.email", "tiffin_centers.contact_no", "tiffin_centers.added_date", "plans.name"];

        dataTablesAJAX ($dbh, $sql, "tiffin_centers", $tableColumns, "id");
    }
?>
