<?php
include_once "../base.php";
$table = $_GET['table'];
$db = ucfirst($table);
$id=$_GET['id'];
$$db->update_img($id);
// echo $table;
?>

