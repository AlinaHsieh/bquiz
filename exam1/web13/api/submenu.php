<?php
include_once "../base.php";
dd($_POST);

$data = [];
$main_id = $_POST['main_id'];

//新增次選單
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $id => $text){
        $data['text'] = $text;
        $data['href'] = $_POST['href2'][$id];
        $data['main_id'] = $_POST['main_id'];
        $data['sh'] = 1;
        $Menu->save($data);
    }
}


//編輯次選單
if(isset($_POST['text'])){
    foreach($_POST['text'] as $id => $text){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $row = $Menu->find($id);
            $row['text'] = $text;
            $row['href'] = $_POST['href'][$id];
            $Menu->save($row);
        }
    }
}
to("../backend.php?do=menu");
