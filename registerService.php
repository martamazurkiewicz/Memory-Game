<?php
require_once('config/Database.php');
class RegisterService
{
    function Register($username, $password)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        $username = htmlspecialchars(strip_tags($username));
        $stmt = $conn->prepare("SELECT * FROM users WHERE userName=:username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        if($stmt->rowCount() > 0)
            return 0;
        else {
            $hash = password_hash($password,PASSWORD_BCRYPT);
            $stmt = $conn->prepare("INSERT INTO users(userName, hash, highestScore) VALUES (:username, :hash, 0)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':hash', $hash);
            if($stmt->execute())
                return 1;
            else
                throw new Exception('Connection failed');
        }
    }
}