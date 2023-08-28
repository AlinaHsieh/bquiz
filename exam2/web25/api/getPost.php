<?php include_once "../base.php";
// dd($_GET);
$type = $_GET['id'];
$row = $News->find($type);
echo nl2br($row['text']);