<?php
include_once "../base.php";
$data = [];
$table = $_POST['table'];
$db = ucfirst($table);

if(!empty($_FILES['img']['tmp_name'])){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/". $_FILES['img']['name']);
}

if(isset($_POST['text'])){
    $data['text'] = $_POST['text'];
}

if($table!='title'){
    $data['sh']=1;
}else{
    $data['sh']=0;
}

$$db->save($data);
to("../backend.php?do=$table");
