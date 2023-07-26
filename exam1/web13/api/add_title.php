<?php include_once "../base.php";
// dd($_POST);

$table = $_POST['table'];
$db = ucfirst($table);
$data = [];

if(!empty($_FILES['img']['tmp_name'])){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/" . $_FILES['img']['name']);
}

$data['text'] = $_POST['text'];
$data['sh'] = 0;

// dd($data);

$$db->save($data);
to("../backend.php?do=$table");
