<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render_login();

    elseif ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (!isset ($_POST["email"]) || preg_match ("/^[\w\.-]+@[\w]+\.[a-zA-Z]{2,6}$/i", $_POST["email"]) == 0)
            $error_msg = "Invalid Email";

        if (!isset ($error_msg))
        {
            $query = $dbh->prepare("SELECT * FROM admins WHERE email = :email");
            $query->bindParam(":email", $_POST["email"]);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);

            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_name"] = $user["name"];

            if (password_verify($_POST["password"], $user["password_hash"]))
                redirect ("dashboard");
            else
                $error_msg = "Incorrect Email or Password!";
        }

        render_login ($error_msg);
    }
?>
