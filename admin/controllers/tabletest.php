<?php

    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render("tabletest-view", ["title" => "Table Test"]);
    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $db = ["host" => "localhost", "dbname" => "sampledb", "username" => "root", "password" => "pass1234"];

        // connect to database
        try
        {
            $dbh = new PDO("mysql:host=".$db["host"].";dbname=".$db["dbname"],
                $db["username"], $db["password"]);
            $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        }
        catch( PDOException $e)
        {
            //render("msg", ["title" => "Error", "msg" => "Error: Couldn't connect to the databse."]);
            die("Error! " . $err->getMessage());
        }

        $sql = "SELECT * FROM orders";
        $tableColumns = ["orderNumber", "orderDate", "requiredDate", "shippedDate", "status", "comments", "customerNumber"];

        dataTablesAJAX ($dbh, $sql, "orders", $tableColumns, "orderNumber");

        //$draw = $_POST["draw"];
        //$orderByColumnIndex = $_POST["order"][0]["column"];
        //$orderBy = $_POST["columns"][$orderByColumnIndex]["data"];
        //$orderType = $_POST["order"][0]["dir"];
        //$start = $_POST["start"];
        //$length = $_POST["length"];

        //$result = ($handle->query("SELECT COUNT(orderNumber) as total_orders FROM orders")->fetch(PDO::FETCH_ASSOC));
        //$recordsTotal = intval($result["total_orders"]);

        //if (!empty($_POST["search"]["value"]))
        //{
            //for ($i = 0; $i < count($_POST["columns"]); $i++)
                //$where[] = $_POST["columns"][$i]["data"]." LIKE '%".$_POST["search"]["value"]."%'";
            //$whereSql = "Where ".implode(" OR ", $where);
            //$recordsFiltered = count(($handle->query("SELECT * FROM orders $whereSql"))->fetchAll(PDO::FETCH_ASSOC));

            //$data = ($handle->query("SELECT * FROM orders $whereSql ORDER BY $orderBy $orderType LIMIT $start, $length")->fetchAll(PDO::FETCH_ASSOC));

            ////for ($i = 0; $i < count($_POST["columns"]); $i++)
                ////$where[] = ":col$i LIKE :$i";
            ////$whereSql = "WHERE ".implode(" OR ", $where);

            ////$query = $handle->prepare("SELECT * FROM orders $whereSql");
            ////for ($i = 0; $i < count($_POST["columns"]); $i++)
            ////{
                ////$query->bindParam(":col$i", $_POST["columns"][$i]["data"]);
                ////$query->bindValue(":$i", "%".$_POST["search"]["value"]."%");
            ////}
            ////$query->execute();
            ////$recordsFiltered = count($query->fetchAll(PDO::FETCH_ASSOC));

            ////$query = $handle->prepare("SELECT * FROM orders $whereSql ORDER BY :orderBy :orderType LIMIT :start, :length");
            ////$query->bindParam(":orderBy", $orderBy);
            ////$query->bindParam(":orderType", $orderType);
            ////$query->bindParam(":start", $start, PDO::PARAM_INT);
            ////$query->bindParam(":length", $length, PDO::PARAM_INT);

            ////for ($i = 0; $i < count($_POST["columns"]); $i++)
            ////{
                ////$query->bindParam(":col$i", $_POST["columns"][$i]["data"]);
                ////$query->bindValue(":$i", "%".$_POST["search"]["value"]."%");
            ////}

            ////$query->execute();
            ////$data = $query->fetchAll(PDO::FETCH_ASSOC);
        //}
        //else
        //{
            //$query = $handle->prepare("SELECT * FROM orders ORDER BY :orderBy :orderType LIMIT :start, :length");
            //$query->bindParam(":orderBy", $orderBy);
            //$query->bindParam(":orderType", $orderType);
            //$query->bindParam(":start", $start, PDO::PARAM_INT);
            //$query->bindParam(":length", $length, PDO::PARAM_INT);

            //$query->execute();
            //$data = $query->fetchAll(PDO::FETCH_ASSOC);

            //$recordsFiltered = $recordsTotal;
        //}

        //$response = array(
            //"draw" => $draw,
            //"recordsTotal" => $recordsTotal,
            //"recordsFiltered" => $recordsFiltered,
            //"data" => $data
        //);
        //$_POST = NULL;

        //header ("Content-type: application/json");
        //print (json_encode($response, JSON_PRETTY_PRINT));
    }
?>
