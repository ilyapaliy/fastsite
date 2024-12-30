<?php
require_once '../db.php';

$title = $_POST['title'];
$text = $_POST['text'];
$stmt = $pdo->prepare('INSERT INTO `articles` (`ID`, `name`, `text`, `time`) VALUES (NULL, :nam, :tex, CURRENT_TIMESTAMP)');
$stmt->execute(['nam' => $title, 'tex' => $text]);
echo "cool";
// INSERT INTO `articles` (`ID`, `name`, `text`, `time`) VALUES (NULL, '3456', '23456', CURRENT_TIMESTAMP);
?>