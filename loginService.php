<?php
class LoginService
{
    function Login($username, $password)
    {
        require 'config/Database.php';
        $db = new Database();
        $conn = $db->connectToDatabse();
        $username = htmlspecialchars(strip_tags($username));
        $stmt = $conn->prepare("SELECT * FROM users WHERE username=:username");
        $stmt->bindParam(':username', $username);
        if ($stmt->execute()) {
            if ($stmt->rowCount() != 1) 
                return 0;
            else 
            {
                $query = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $query['hash']))
                { 
                    $_SESSION['username'] = $query['username'];
                    $_SESSION['highestScore'] = $query['highestScore'];
                }
                return 1;
            }
        } 
        else 
            throw new Exception('Connection failed');
    }
}
