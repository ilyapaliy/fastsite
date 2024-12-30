<?php
require_once '../db.php';

$id = $_GET['id'];
// echo '_ _' . $id . '_ _';
$stmt = $pdo->prepare('SELECT ID, name, `text` FROM articles WHERE ID = :id');
$stmt->execute(['id' => $id]);
$article = $stmt->fetch(PDO::FETCH_ASSOC);
// echo '__' . $article . '__';
// echo 'title=' . $article['name'] . 'text=' . $article['text'];
echo json_encode([$article['name'], $article['text']]);
// echo ['title' => $article['name'], 'text' => $article['text']];
?>