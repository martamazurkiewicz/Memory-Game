<?php
require 'config/Database.php';
class RegisterService
{
    function __constructor($userName, $password)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        $userName = htmlspecialchars(strip_tags($userName));
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = :userName");
        $stmt->bindParam(':userName', $userName);
        $stmt->execute();
    
        if($stmt->rowCount() > 0)
            throw new Exception('Username already exists');
        else {
            $hash = password_hash($password,PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO users(userName, hash) VALUES (userName = :userName, hash = :hash)");
            $stmt->bindParam(':userName', $userName);
            $stmt->bindParam(':hash', $hash);
            if($stmt->execute())
                return 1;
            else
                throw new Exception('User not created');
        }
    }
}