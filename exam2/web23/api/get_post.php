<?php include_once "../base.php";
$post = $News->find($_GET['id']);
echo $post['title'];
echo nl2br($post['text']);