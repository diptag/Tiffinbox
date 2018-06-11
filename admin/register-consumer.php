<?php
    require ("../db-config.php");

    $stmt = $dbh->prepare("INSERT INTO consumers (`name`, `address`, `email`, `contact_no`, `city`, `state`, `password_hash`) VALUES ('Ankur Shiledar', 'A 8 Vaishali Nagar', 'ankur@gmail.com', '7894789465', 'Jaipur', 'Rajasthan', :password_hash);");
    $stmt->bindValue(":password_hash", password_hash("pass1234", PASSWORD_DEFAULT));
    $stmt->execute();
?>
