<?php
include_once "../base.php";
// dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);
// echo $db;
$row = $$db->find(1);
// dd($row);
$row['bottom'] = $_POST['bottom'];
$$db->save($row);

to('../backend.php?do=bottom');