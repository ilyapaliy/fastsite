<?php
require_once '../db.php';

$name = trim($_POST['login']);

if(!empty($name)) {
	if($_SESSION['user_login'] == 'admin') {
		//check user's existing
		$sql_check = 'SELECT EXISTS( SELECT name FROM users WHERE name = :name)';
		$stmt_check = $pdo->prepare($sql_check);
		$stmt_check->execute(['name' => $name]);
		if(!$stmt_check->fetchColumn()) {
			echo 1;
		}else {

		$sql = 'DELETE FROM users WHERE users.name = :name';
		$params = ['name' => $name];
		$stmt = $pdo->prepare($sql);
		$stmt->execute($params);
		echo 2;
		}
	}else {
		echo 4;
	}

}else {
	echo 3;
}

/*
DELETE FROM `users` WHERE `users`.`ID` = 1
*/
?>