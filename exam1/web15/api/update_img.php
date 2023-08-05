<?php include_once "../base.php";

// dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);
$id = $_POST['id'];
$row = $$db->find($id);
dd($row);
if(file_exists($_FILES['img']['tmp_name'])){
    $row['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/{$_FILES['img']['name']}");
}

$$db->save($row);
to("../backend.php?do=$table");