<?php 
session_start();
require 'registerService.php';
$rs = new RegisterService();
$username = $_POST['username'];
$password = $_POST['password'];
$retval = $rs->Register($username, $password);
if($retval==1)
{
    $_SESSION['message'] = '1';
    header('Location: '.'../login.php');
    exit();
}
else
{
    $_SESSION['message'] = 'Username already exists';
    header('Location: '.'../register.php');
    exit();
}