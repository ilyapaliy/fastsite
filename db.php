<?php

$driver = 'mysql';
$host = 'fastsite';
$db_name = 'fast_site';
$db_user = 'mysql';
$db_pass = 'mysql';
$charset = 'utf8mb4';
// ERRMODE_EXCEPTION - only for debugging!
// in production we need to delete any options! default: PDO::ERRMODE_SILENT
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

try {
	// mysql:host=localhost;dbname=test;port=3306;charset=utf8mb4
	$pdo = new PDO("$driver:host=$host;dbname=$db_name;port=3306;charset=$charset", $db_user, $db_pass, $options);

	//COOKIE
	if(isset($_COOKIE['name'])) {
		setcookie('name', 'password', time() + 60);
	}
	session_start();
}
catch(\PDOException $e) {
	// cool checking, needs to be turned off in production
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

wf 

?>