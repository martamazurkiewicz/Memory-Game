<?php
require 'config/Database.php';
class LoginService
{
    function __constructor($userName, $password)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        $userName = htmlspecialchars(strip_tags($userName));
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :userName");
        $stmt->bindParam(':userName', $userName);
        if ($stmt->execute()) {
            if ($stmt->rowCount() != 1) 
                throw new Exception('Username with given username do not exists');
            else 
            {
                $query = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $query['hash']))
                { 
                    $_SESSION['userName'] = $query['userName'];
                    $_SESSION['highestScore'] = $query['highestScore'];
                }
                return 1;
            }
        } 
        else 
            throw new Exception('User not signed in');
    }
}
