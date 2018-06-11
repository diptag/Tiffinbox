<?php
    require ("../db-config.php");

    $stmt = $dbh->prepare("INSERT INTO admins (`name`, `email`, `password_hash`) VALUES (:name, :email, :password_hash);");
    $stmt->bindValue(":name", "Diptanshu");
    $stmt->bindValue(":email", "diptanshu@gmail.com");
    $stmt->bindValue(":password_hash", password_hash("pass1234", PASSWORD_DEFAULT));
    $stmt->execute();
?>
