<?php

require_once '../db.php';

if($_GET['func'] == 'get') {
	$id = $_GET['id'];
	$stmt = $pdo->prepare('SELECT ID, name, `type` FROM photo WHERE ID = :id');
	$stmt->execute(['id' => $id]);
	$photo = $stmt->fetch(PDO::FETCH_ASSOC);
	echo json_encode([$photo['name'], $photo['type']]);
}

if($_POST['func'] == 'new') {
	$name = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$title = $_POST['title'];
	move_uploaded_file($tmp_name, 'C:\\Projects\\web\\fastSite\\photo\\' . $name);
	
	$stmt = $pdo->prepare('INSERT INTO `photo` (`ID`, `name`, `type`, `time`) VALUES (NULL, :nam, :tex, CURRENT_TIMESTAMP)');
	$stmt->execute(['nam' => $title, 'tex' => $name]);
	
	echo "cool";
}

//////////////////////////  from save_article  \\\\\\\\\\\\\\\\\\\\\\\\\\\
if($_POST['func'] == 'save') {
	$name = $_FILES['file']['name'];
	$tmp_name = $_FILES['file']['tmp_name'];
	$title = $_POST['title'];
	$id = $_POST['id'];
	
	$stmt = $pdo->prepare('SELECT `type` FROM photo WHERE ID = :id');
	$stmt->execute(['id' => $id]);
	$photo = $stmt->fetch(PDO::FETCH_ASSOC);
	unlink("C:\\Projects\\web\\fastSite\\photo\\" . $photo['type']);
	
	move_uploaded_file($tmp_name, 'C:\\Projects\\web\\fastSite\\photo\\' . $name);
	
	$stmt = $pdo->prepare('UPDATE photo SET `name` = :tle, `type` = :txt WHERE photo.ID = :id');
	$stmt->execute(['id' => $id, 'tle' => $title, 'txt' => $name]);
	echo "cool";
}

if($_POST['func'] == 'del') {
	$id = $_POST['id'];
	$stmt = $pdo->prepare('SELECT `type` FROM photo WHERE ID = :id');
	$stmt->execute(['id' => $id]);
	$photo = $stmt->fetch(PDO::FETCH_ASSOC);
//fwrite(fopen("C:\\Projects\\web\\fastSite\\photo\\php.txt", 'w'), "C:\\Projects\\web\\fastSite\\photo\\" . $id . "." . $photo['type']);
	unlink("C:\\Projects\\web\\fastSite\\photo\\" . $photo['type']);
	$stmt = $pdo->prepare('DELETE FROM `photo` WHERE `photo`.`ID` = :id');
	$stmt->execute(['id' => $id]);
	echo "cool";
}
?>