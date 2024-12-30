<?php
require_once '../db.php';

$name = trim($_POST['login']);
$pwd = $_POST['pwd'];

if(!empty($name) && !empty($pwd)) {

	$sql = 'SELECT name, password FROM users WHERE name = :name';

	$params = ['name' => $name];

	$stmt = $pdo->prepare($sql);
	$stmt->execute($params);

	$user = $stmt->fetch(PDO::FETCH_OBJ);

	if($user) {
		if(password_verify($pwd, $user->password)) {
			$_SESSION['user_login'] = $user->name;
			// header('Location: ../index.php');
			echo 1;
		}else {
			echo 2;
		}
	}else {
		echo 2;
	}

}else {
	echo 3;
}

/*
INSERT INTO `users` (`ID`, `name`, `password`) VALUES (NULL, '789', '789')

$ php -a
Interactive shell
*/
?>