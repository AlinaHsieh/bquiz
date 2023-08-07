<?php 
include_once "../base.php"; 
// $table = $_POST['table'];
// $db = ucfirst($table);
dd($_POST);

//新增
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $id => $text){
    $row=[];
    $row['text'] = $_POST['text2'][$id];
    $row['href'] = $_POST['href2'][$id];
    $row['main_id'] = $_POST['main_id'];
    dd($row);
    $Menu->save($row);
    }
}
to("../backend.php?do=menu");

//更新
if(isset($_POST['text'])){
    foreach($_POST['text'] as $id => $text){
        $row = $Menu->find($id);
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $row['text']= $_POST['text'][$id];
            $row['href'] = $_POST['href'][$id];
            $Menu->save($row);
        }
    }
}
to("../backend.php?do=menu");