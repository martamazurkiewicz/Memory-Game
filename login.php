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
    <title>Sign up!</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
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
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }

.alertRed {
  padding: 20px;
  background-color: #f44336; /* Red */
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
<div class="login-form">
    <form method="POST" action="loginHandler.php">
    <h2 class="text-center">Sign In</h2>
         <?php
            //var_dump(isset($_SESSION['message']));
            if(isset($_SESSION['message'])) {
                if ($_SESSION['message'] == '1')
                {
            ?>
            <div class='alertGreen'>
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            Signed in succesfully
            </div>
            <?php
                }
                else
                {
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