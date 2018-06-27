<?php
    consumerCheck();
    if ($_SERVER["REQUEST_METHOD"] == "GET")
        render ("cart-view", ["title" => "Cart", "active_page" => "cart"]);
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST["remove"]))
        {
            if (isset($_SESSION["cart"][$_POST["remove"]]))
                unset($_SESSION["cart"][$_POST["remove"]]);
            exit();
        }
        else if (isset($_POST["removeAll"]))
        {
            unset($_SESSION["cart"]);
            exit();
        }

        if (!isset($_POST["item"]))
            $error_msg = "Invalid Tiffinbox Cart Item!";

        $query = $dbh->prepare("SELECT menus.*, tiffin_centers.name as tiffin_center FROM menus INNER JOIN tiffin_centers ON tiffin_centers.id = menus.tiffin_center_id WHERE menus.id = :id");
        $query->bindParam(":id", $_POST["item"], PDO::PARAM_INT);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if (!$result)
            $error_msg = "No Such Items Found!";

        if (isset($error_msg))
        {
            echo ($error_msg);
            exit;
        }
        else
        {
            if (!isset($_SESSION["cart"][$result["id"]]))
            {
                $result["quantity"] = 1;
                $_SESSION["cart"][$result["id"]] = $result;
            }
            else
                $_SESSION["cart"][$result["id"]]["quantity"] += 1;

            echo ("Added to Cart");
            exit;
        }
    }
?>
