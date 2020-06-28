<?php 
require 'registerService.php';
session_start();
if(new RegisterService($_POST['userName'], $_POST['password'])==1)
{
    $_SESSION['retval'] = 'User succesfully registered';
    header('Location: '.'login.php');
    die();
}
else
{
    $_SESSION['retval'] = 'Username already exists';
    header('Location: '.'register.php');
    die();
}