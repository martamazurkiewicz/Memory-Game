<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memory Game</title>
    <link rel="stylesheet" type="text/css" href="game.css">
    <script src="game.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="/">Memory Game</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/game.php">New game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/score.php">Scoreboard</a>
            </li>
        </ul>
        <span class="navbar-text">
            <?php
            if (session_status() && isset($_SESSION['username'])) {
                echo ($_SESSION['username']);
            ?>
                <a class="nav-link" href="/logout.php">Sign out</a>
            <?php
            } else {
            ?>
                <a class="nav-link" href="/login.php">Sign In</a>
                <a class="nav-link" href="/register.php">Signed Up</a>
            <?php
            }
            ?>
        </span>
        </div>
    </nav>