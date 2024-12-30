<?php
require_once '../db.php';

$id = $_POST['id'];
$stmt = $pdo->prepare('DELETE FROM `articles` WHERE `articles`.`ID` = :id');
$stmt->execute(['id' => $id]);
echo "cool";
// DELETE FROM `articles` WHERE `articles`.`ID` = 15
?>