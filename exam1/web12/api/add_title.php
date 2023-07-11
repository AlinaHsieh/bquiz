<?php
include_once "../base.php";
$data = [];

//圖片欄位
if (!empty($_FILES['img']['tmp_name'])) {
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'], '../upload/' . $_FILES['img']['name']);
}

//文字欄位
$data['text'] = $_POST['text'];

$data['sh'] = 0;
// dd($data);
// dd($_POST);
$Title->save($data);
to("../backend.php?do=title");
