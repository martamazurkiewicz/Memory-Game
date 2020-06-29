<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('scoreService.php');
$tmpScore = 0;
if (isset($_POST['score']))
    $tmpScore = $_POST['score'];
else if (isset($_SESSION['highestScore']))
    $tmpScore = $_SESSION['highestScore'];
else
    $tmpScore = 0;
$ss = new ScoreService();
$ss->SetScore($tmpScore);
header('Location: ' . '../score.php');
exit();
