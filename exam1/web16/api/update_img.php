<?php 
include_once "../base.php"; 
$table = $_POST['table'];
$db = ucfirst($table);
dd($_POST);

$data = $$db->find($_POST['id']);

if(file_exists($_FILES['img']['tmp_name'])){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/{$_FILES['img']['name']}");
}

$$db->save($data);
to("../backend.php?do=$table");