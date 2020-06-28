<?php 
require 'loginService.php';
session_start();
$ls = new LoginService();
$username = $_POST['username'];
$password = $_POST['password'];
$retval = $ls->Login($username, $password);
if($retval==1)
{
    $_SESSION['retval'] = '1';
    header('Location: '.'../index.php');
    die();
}
else
{
    $_SESSION['retval'] = 'Invalid login or password';
    header('Location: '.'../login.php');
    die();
}