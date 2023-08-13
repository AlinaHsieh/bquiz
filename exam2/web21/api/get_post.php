<?php include_once "../base.php";

$post = $News->find($_GET['id']);
echo nl2br($post['text']);