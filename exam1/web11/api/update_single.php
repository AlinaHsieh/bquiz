<?php
include_once "../base.php";
// dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);
$row = $$db->find(1); //去找資料庫的第一筆資料
switch($table){
    case 'total':
        $row['total'] = $_POST['total'];
    break;
    case 'bottom':
        $row['bottom'] = $_POST['bottom'];
    break;
}
$$db->save($row);
to("../backend.php?do=$table");
