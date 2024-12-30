<?php
var_dump($_FILES, $_POST);
$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$title = $_POST['title'];
//fwrite(fopen("C:\\Projects\\web\\fastSite\\pages\\debag.log", 'w'), $_FILES['file'] . '|||');
move_uploaded_file($tmp_name, 'C:\\Projects\\web\\fastSite\\pages\\' . $name);
?>