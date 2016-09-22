<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();

function loadClass($class)
{
	require_once '../class/'.$class.'.php';
}

spl_autoload_register('loadClass');

$login = new Login();

if ($login->killSession()) {
	header("Location: ../index.php");
}