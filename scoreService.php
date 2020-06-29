<?php
require_once('config/Database.php');
class ScoreService
{
    function GetScore()
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        if (isset($_SESSION['username'])) {
            $stmt = $conn->prepare("(SELECT userName, highestScore FROM users ORDER BY highestScore LIMIT 10) UNION (SELECT userName, highestScore FROM users WHERE userName=:username)");
            $stmt->bindParam(':username', $_SESSION['username']);
        } else 
            $stmt =  $conn->prepare("SELECT userName, highestScore FROM users ORDER BY highestScore LIMIT 10");
        $stmt->execute();
        $i = 0;
        $usernames = array();
        $scores = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usernames[$i] = $row['userName'];
            $scores[$i] = $row['highestScore'];
            $i++;
        }
        return array($usernames, $scores);
    }
    function SetScore($tmpScore)
    {
        $db = new Database();
        $conn = $db->connectToDatabse();
        $tmpScore = htmlspecialchars(strip_tags($tmpScore));
        if (isset($_SESSION['highestScore'])) {
            if ($tmpScore > $_SESSION['highestScore']) {
                $stmt = $conn->prepare("UPDATE users SET highestScore = :highestScore WHERE userName=:username");
                $stmt->bindParam(':username', $_SESSION['username']);
                $stmt->bindParam(':highestScore', $tmpScore);
                $_SESSION['highestScore'] = $tmpScore;
                if ($stmt->execute())
                    return 1;
                else
                    throw new Exception('Connection failed');
            }
        }
    }
}
