<?php
include_once "../base.php";
//save function 括弧中是陣列>宣告一個空陣列
$data = []; 

//圖片欄位
if(!empty($_FILES['img']['tmp_name'])){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],'../upload/' . $_FILES['img']['name']);
}

//文字欄位
$data['text'] = $_POST['text'];

//預設不顯示
$data['sh'] = 0;

$Title->save($data); //寫入資料表
    // dd($data);   
to("../backend.php?do=title");


?>