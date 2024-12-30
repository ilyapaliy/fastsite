<?php
require_once '../db.php';

$name = trim($_POST['login']);
$pwd = $_POST['pwd'];

if(!empty($name) && !empty($pwd)) {

	//check user's existing
	$sql_check = 'SELECT EXISTS( SELECT name FROM users WHERE name = :name)';
	$stmt_check = $pdo->prepare($sql_check);
	$stmt_check->execute(['name' => $name]);
	if($stmt_check->fetchColumn()) {
		echo 1;
	}else {

	//adding user
	$pwd = password_hash($pwd, PASSWORD_DEFAULT);
	$sql = 'INSERT INTO users(ID, name, password) VALUES(NULL, :name, :password)';
	$params = ['name' => $name, 'password' => $pwd];
	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);

	echo 2;
	}

}else {
	echo 3;
}

/*
INSERT INTO `users` (`ID`, `name`, `password`) VALUES (NULL, '789', '789')
<script>alert("Это сообщение");</script>
$ php -a
Interactive shell
*/
?>