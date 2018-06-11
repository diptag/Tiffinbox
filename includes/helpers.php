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

    function login($dbh, $table_name)
    {
        if (!isset($_POST["email"]) || empty($_POST["email"]) || preg_match ("/^[\w\.-]+@[\w]+\.[a-zA-Z]{2,6}$/i", $_POST["email"]) == 0)
            $error_msg = "Invalid Email or Password";
        else if (!isset($_POST["pass"]) || empty($_POST["pass"]) || strlen($_POST["pass"]) < 8 || strlen($_POST["pass"]) > 20)
            $error_msg = "Invalid Email or Password";
        else
        {
            $query = $dbh->prepare("SELECT * FROM $table_name WHERE email = :email");
            $query->bindParam(":email", $_POST["email"]);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            if (!isset($user["id"]))
                $error_msg = "Unknown Username or Password";
            else if (password_verify($_POST["pass"], $user["password_hash"]))
            {
                $_SESSION["user_id"] = $user["id"];
                $_SESSION["user_name"] = $user["name"];
                $_SESSION["user_type"] = $table_name == "consumers" ? "Consumer" : "Tiffin Center";
                redirect("home");
            }
            else
                $error_msg = "Unknown Username or Password";
        }

        if ($table_name == "consumers")
            $dict = ["title" => "User Login", "active_page" => "login", "login_type" =>"User", "form_action" => "user-login", "error_msg" => $error_msg];
        else if ($table_name == "tiffin_centers")
            $dict = ["title" => "Tiffin Center Login", "active_page" => "login", "login_type" => "Tiffin Center", "form_action" => "tiffin-center-login", "error_msg" => $error_msg];

        render ("login-view", $dict);
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
