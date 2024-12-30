<?php
require_once '../db.php';

$id = $_POST['id'];
$title = $_POST['title'];
$text = $_POST['text'];
// echo $id . '-------' . $title . '-------' . $text;
$stmt = $pdo->prepare('UPDATE articles SET `name` = :tle, `text` = :txt WHERE articles.ID = :id');
$stmt->execute(['id' => $id, 'tle' => $title, 'txt' => $text]);
echo "cool";
?>