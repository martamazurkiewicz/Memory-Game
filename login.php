<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Memory Game</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }

        .alertRed {
            padding: 20px;
            background-color: #f44336;
            /* Red */
            color: white;
            margin-bottom: 15px;
        }

        .alertGreen {
            padding: 20px;
            background-color: lightgreen;
            color: white;
            margin-bottom: 15px;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>
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
        </div>
    </nav>
    <div class="login-form">
        <form method="POST" action="loginHandler.php">
            <h2 class="text-center">Sign In</h2>
            <?php
            if (isset($_SESSION['message'])) {
                if ($_SESSION['message'] == '1') {
            ?>
                    <div class='alertGreen'>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        Signed up succesfully
                    </div>
                <?php
                } else {
                ?>
                    <div class='alertRed'>
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        <?php echo $_SESSION['message']; ?>
                    </div>
            <?php
                }
                unset($_SESSION['message']);
            }
            ?>
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign up</button>
        </form>
        <p class="text-center"><a href="/register.php">Create an Account</a></p>
    </div>
</body>

</html>