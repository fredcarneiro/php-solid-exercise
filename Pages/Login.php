<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

function loadClass($class)
{
	require_once '../class/'.$class.'.php';
}

spl_autoload_register('loadClass');

$email = stripslashes(strip_tags($_POST['l_email']));
$password = stripslashes(strip_tags($_POST['l_password']));

$login = new Login();
$logged = $login->loginUser($email, $password);

if ($logged) {
	header("Location: SearchUser.php");
}else{
	header("Location: ../index.php");
}