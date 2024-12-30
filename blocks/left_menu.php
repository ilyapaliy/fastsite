<?php
require_once '../db.php';

$sql_articles = $pdo->query('SELECT ID, name FROM articles');

?>
<div class="col-sm-3 left-menu">
 	<? while($row = $sql_articles->fetch(PDO::FETCH_ASSOC)) {
		echo '<div id="' . $row['ID'] . '" class="article">
		<div class="row p-0 m-0">
		<div class="col p-0 m-0 art_name"><span class="artn">' . $row['name'] . '</span></div>
		<div class="col col-auto p-0 m-0 icon_edit"><img class="icon arte" src="../blocks/icon_edit.png" alt="edit"></div>
		<div class="col col-auto p-0 m-0 icon_delete"><img class="icon artd" src="../blocks/icon_delete.png" alt="delete"></div>
		</div>
	</div>';
	} ?>
<!-- 	<div id="ID" class="article">
		<div class="row p-0 m-0">
		<div class="col p-0 m-0"><span>some txt</span></div>
		<div class="col col-auto p-0 m-0"><img class="icon" src="../blocks/icon_edit.png" alt="edit"></div>
		<div class="col col-auto p-0 m-0"><img class="icon" src="../blocks/icon_delete.png" alt="delete"></div>
		</div>
	</div> -->
	<div id="new-article" class="article">Create article!</div>
</div>