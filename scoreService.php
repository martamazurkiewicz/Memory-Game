<?php
require '/config/Database.php';
class ScoreService
{
    function __constructor($tmpScore)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        
        if ($tmpScore > $_SESSION['highestScore']) 
        {
            $stmt = $conn->prepare("UPDATE users SET highestScore = :highestScore WHERE username = :userName");
            $stmt->bindParam(':userName', $_SESSION['userName']);
            $stmt->bindParam(':highestScore', $tmpScore);
            $_SESSION['highestScore'] = $tmpScore;
            if(!$stmt->execute())
                throw new Exception('Connection failed');
        }
        $stmt = $conn->prepare("SELECT userName, highestScore FROM users ORDER BY highestScore LIMIT 5 UNION SELECT userName, highestScore FROM users WHERE username = :userName");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
