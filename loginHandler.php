<?php 
require 'loginService.php';
session_start();
if(new LoginService($_POST['userName'], $_POST['password'])==1)
{
    $_SESSION['retval'] = 'User signed in';
    header('Location: '.'index.php');
    die();
}
else
{
    $_SESSION['retval'] = 'Invalid login or password';
    header('Location: '.'login.php');
    die();
}