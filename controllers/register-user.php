<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render ("register-user-view", ["title" => "Register User", "active_page" => "login"]);
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        validate();
        if (empty($_POST["name"]) || !preg_match("/[a-zA-Z ]{3,}/", $_POST["name"]))
            $error_msg = "Invalid Name!";
        elseif (empty($_POST["address"]) || !preg_match("/[a-zA-Z0-9 ]{6,}/", $_POST["address"]))
            $error_msg = "Invalid Address!";
        elseif (empty($_POST["address"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
            $error_msg = "Invalid Email!";
        elseif (empty($_POST["contact"]) || !preg_match("/[0-9]{10}/", $_POST["contact"]))
            $error_msg = "Invalid Contact Number!";
        elseif (empty($_POST["city"]) || !preg_match("/[a-zA-Z ]{3,}/", $_POST["city"]))
            $error_msg = "Invalid City Name";
        elseif (empty($_POST["state"]) || !preg_match("/[a-zA-Z ]{3,}/", $_POST["state"]))
            $error_msg = "Invalid State Name";
        elseif (empty($_POST["pass"]) || !preg_match("^((?:[A-Za-z0-9-'.,@:?!()$#/\\]+|&[^#])*&?){8,20}$", $_POST["pass"]))
            $error_mag = "Password Should Be atleast 8 to 20 characters";
        elseif ($_POST["pass"] != $_POST["repass"])
            $error_msg = "Passwords Do Not Match!";

        if (isset($error_msg))
            render ("register-user-view", ["error_msg" => $error_msg]);

        $stmt = $dbh->prepare("INSERT INTO `consumers`(`name`, `address`, `email`, `contact_no`, `city`, `state`, `password_hash`) VALUES (:name, :address, :email, :contact, :city, :state, :pass)");
        $stmt->bindParam(":name", $_POST["name"]);
        $stmt->bindParam(":address", $_POST["address"]);
        $stmt->bindParam(":email", $_POST["email"]);
        $stmt->bindParam(":contact", $_POST["contact"]);
        $stmt->bindParam(":city", $_POST["city"]);
        $stmt->bindParam("state", $_POST["state"]);
        $stmt->bindParam(":pass", password_hash($_POST["pass"], PASSWORD_DEFAULT));
        if ($stmt->execute())
            redirect("home");
        else
            render ("register-user-view", ["error_msg" => "Cannot Register User!"]);
    }
?>
