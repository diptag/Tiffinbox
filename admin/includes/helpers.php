<?php
    /*
     * File containing helpful functions for the website
     */

    // render view passed as value
    function render ($view, $values = [])
    {
        // extract variables in local scope
        extract($values);

        // render views between header and footer
        require(__DIR__."/../views/header.php");
        require(__DIR__."/../views/navbar.php");
        require(__DIR__."/../views/sidebar.php");
        require(__DIR__."/../views/".$view.".php");
        require(__DIR__."/../views/footer.php");
        exit;
    }

    function render_only ($view, $values = [])
    {
        extract($values);

        require(__DIR__."/../views/".$view.".php");
        exit;
    }

    function render_login ($error_msg = "")
    {
        $title = "Login";
        require (__DIR__."/../views/header.php");
        require (__DIR__."/../views/login-view.php");
        exit;
    }

    // redirect to the page passed as argument
    function redirect ($location)
    {
        // send location header
        header("Location: {$location}");
        exit;
    }

    function validate ()
    {
        foreach ($_POST as $key => $value)
            $_POST[$key] =  htmlspecialchars (trim ($_POST[$key]));
    }

    function dataTablesAJAX ($dbh, $sql, $tableName, $tableColumns, $pk)
    {
        $draw = $_POST["draw"];
        $orderByColumnIndex = $_POST["order"][0]["column"];
        $orderBy = $_POST["columns"][$orderByColumnIndex]["data"];
        $orderType = $_POST["order"][0]["dir"];
        $start = $_POST["start"];
        $length = $_POST["length"];

        $result = ($dbh->query("SELECT COUNT($pk) as totalRecords FROM ".$tableName)->fetch(PDO::FETCH_ASSOC));
        $recordsTotal = intval($result["totalRecords"]);

        if (!empty($_POST["search"]["value"]))
        {
            for ($i = 0; $i < count($tableColumns); $i++)
                $where[] = $tableColumns[$i]." LIKE '%".$_POST["search"]["value"]."%'";
            $whereSql = "Where ".implode(" OR ", $where);
            $recordsFiltered = count(($dbh->query($sql." ".$whereSql))->fetchAll(PDO::FETCH_ASSOC));

            $data = ($dbh->query("$sql $whereSql ORDER BY $orderBy $orderType LIMIT $start, $length")->fetchAll(PDO::FETCH_ASSOC));
        }
        else
        {
            $data = ($dbh->query("$sql ORDER BY $orderBy $orderType LIMIT $start, $length")->fetchAll(PDO::FETCH_ASSOC));

            $recordsFiltered = $recordsTotal;
        }

        $response = array(
            "draw" => $draw,
            "recordsTotal" => $recordsTotal,
            "recordsFiltered" => $recordsFiltered,
            "data" => $data
        );
        $_POST = NULL;

        header ("Content-type: application/json");
        print (json_encode($response));
    }
?>
