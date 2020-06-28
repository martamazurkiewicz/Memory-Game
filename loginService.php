<?php
require_once('config/Database.php');
class LoginService
{
    function Login($username, $password)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        $username = htmlspecialchars(strip_tags($username));
        $stmt = $conn->prepare("SELECT * FROM users WHERE userName=:username");
        $stmt->bindParam(':username', $username);
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                $query = $stmt->fetch(PDO::FETCH_ASSOC);
                if (password_verify($password, $query['hash'])) {
                    $_SESSION['username'] = $query['userName'];
                    $_SESSION['highestScore'] = $query['highestScore'];
                    return 1;
                } else
                    return 0;
            }
            return 0;
        } else
            throw new Exception('Connection failed');
    }
}
