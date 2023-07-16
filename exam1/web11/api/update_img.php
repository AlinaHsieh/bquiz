<?php
include_once "../base.php";
// dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);
//要判斷$row是哪筆資料>find $_POST['id']
$row = $$db->find($_POST['id']); //資料庫的資料

if(!empty($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/' . $_FILES['img']['name']);
    $row['img'] = $_FILES['img']['name'];
}

$$db->save($row);
to("../backend.php?do=$table");
