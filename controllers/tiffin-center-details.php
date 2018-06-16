<?php
    if (!isset($_POST["tfid"]))
        $error_msg = "No Such Tiffin Center Found!";

    $query = $dbh->prepare("SELECT tiffin_centers.*, menus.menu, menus.price FROM tiffin_centers INNER JOIN menus ON menus.tiffin_center_id = tiffin_centers.id WHERE tiffin_centers.id = :tfid");
    $query->bindParam(":tfid", $_POST["tfid"]);
    $query->execute();
    $details = $query->fetchAll(PDO::FETCH_ASSOC);

    if (count($details) == 0)
        $error_msg = "No Such Tiffin Center Found!";

    if (isset($error_msg))
        render_only ("tiffin-center-details-view", ["error_msg" => $error_msg]);
    else
        render_only ("tiffin-center-details-view", ["tiffin_center" => $details[0]]);
?>
