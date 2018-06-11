<?php
    $query= $dbh->query("SELECT *, FROM_UNIXTIME(date_added, '%d %b, %Y') AS dateAdded FROM static_pages");
    $staticpages = $query->FetchAll(PDO::FETCH_ASSOC);
    render ("staticpages-view", ["title" => "Static Pages", "active_page" => "staticpages", "staticpages" => $staticpages]);
?>
