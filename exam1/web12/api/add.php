<?php
include_once "../base.php";
$table = $_POST['table'];
$db=ucfirst($table);

$data = [];

//圖片欄位
if (!empty($_FILES['img']['tmp_name'])) {
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], '../upload/' . $_FILES['img']['name']);
}

switch($table){
    case 'title':
    case 'ad':
    case 'news':
        $data['text'] = $_POST['text'];
    break;
    case 'admin':
        $data['acc'] = $_POST['acc'];
        $data['pw'] = $_POST['pw'];
    break;
}
// if($table=='title'){
//     $data['sh'] = 0;
// }else{
//     $data['sh'] = 1;
// }

if($table!='admin'){
    $data['sh']=($table == 'title')? 0:1;
}

$$db->save($data);
to("../backend.php?do=$table");
