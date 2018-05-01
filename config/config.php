<?php


ob_start();
session_start();

// database credentials
define('DBHOST', 'localhost');
define('DBUSER', 'database username');
define('DBPASS', 'dabase password');
define('DBNAME', 'database name');

$db = new PDO("mysql:host=".DBHOST."port=8889;dbname=".DBNAME, DBUSER, DBPASS);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//set timezone
date_default_timezone_set('Americas/New_York');