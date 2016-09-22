<?php

/**
* This will create the HELLOFRESH.USER table on mysql
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function loadClass($class)
{
	require_once 'class/'.$class.'.php';
}

spl_autoload_register('loadClass');

$c = new DBConnection();

$result = $c->createDatabase();

if ($result) {
	echo "<pre> User table created. </pre>";
	echo "<a href='index.asp'>Back to Index</a>";
}else{
	echo "<pre>Something is wrong with the script.</pre>";
}