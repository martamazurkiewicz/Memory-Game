<?php
require 'config/Database.php';
class ScoreService
{
    function GetScores($tmpScore)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        if (isset($_SESSION['highestScore'])) {
            if ( $tmpScore > $_SESSION['highestScore']) {
                $stmt = $conn->prepare("UPDATE users SET highestScore = :highestScore WHERE userName=:username");
                $stmt->bindParam(':username', $_SESSION['username']);
                $stmt->bindParam(':highestScore', $tmpScore);
                $_SESSION['highestScore'] = $tmpScore;
                if (!$stmt->execute())
                    throw new Exception('Connection failed');
            }
            $stmt = $conn->prepare("SELECT userName, highestScore FROM users ORDER BY highestScore LIMIT 5 UNION SELECT userName, highestScore FROM users WHERE userName=:username");
            $stmt->bindParam(':username', $_SESSION['username']);
            $stmt->execute();
            return $stmt->fetchAll();;
        }
        else
        {
            $stmt =  $conn->prepare("SELECT userName, highestScore FROM users ORDER BY highestScore LIMIT 5");
            $stmt->execute();
            return $stmt->fetchAll();;
        }
    }
}
