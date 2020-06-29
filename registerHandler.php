<?php 
session_start();
require_once('registerService.php');
$rs = new RegisterService();
$retval = $rs->Register($_POST['username'], $_POST['password']);
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
}