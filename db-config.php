<?php
    /*
     * Contains functions to query and insert into database
     */

    // database credentials
    $database = ["host" => "localhost", "dbname" => "tiffinbox", "username" => "root", "password" => "pass1234"];

    // connect to database
    try
    {
        $dbh = new PDO("mysql:host=".$database["host"].";dbname=".$database["dbname"],
        $database["username"], $database["password"]);
        $dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    catch( PDOException $e)
    {
        //render("msg", ["title" => "Error", "msg" => "Error: Couldn't connect to the databse."]);
        die("Error! " . $err->getMessage());
    }
?>
