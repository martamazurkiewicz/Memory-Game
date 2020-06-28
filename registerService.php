<?php
class RegisterService
{
    function Register($username, $password)
    {
        require 'config/Database.php';
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
            $stmt = $conn->prepare("INSERT INTO users(userName, hash) VALUES (:username, :hash)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':hash', $hash);
            if($stmt->execute())
                return 1;
            else
                throw new Exception('Connection failed');
        }
    }
}