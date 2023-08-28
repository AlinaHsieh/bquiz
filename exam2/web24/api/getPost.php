<?php include_once "../base.php";
// dd($_GET);
$row = $News->find($_GET['id']);
// dd($row);
echo (nl2br($row['text']));