<?php 
require 'loginService.php';
session_start();
$ls = new LoginService();
$retval = $ls->Login($_POST['username'], $_POST['password']);
if($retval==1)
{
    $_SESSION['message'] = '1';
    header('Location: '.'../index.php');
    exit();
}
else
{
    $_SESSION['message'] = 'Invalid login or password';
    header('Location: '.'../login.php');
}