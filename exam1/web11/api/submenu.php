<?php
include_once "../base.php";
// dd($_POST);
$main_id = $_POST['main_id'];

//編輯次選單 (傳$_POST['text']/ $_POST['href'] /$_POST['del])
if(isset($_POST['text'])){
    foreach($_POST['text'] as $id =>$text){
        if(isset($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $row=$Menu->find($id);
            $row['text'] = $text;
            $row['href'] = $_POST['href'][$id];
            $Menu->save($row);
        }
    }
}

//新增次選單 (傳$_POST['text2']/ $_POST['href2'])
if(isset($_POST['text2'])){ //先判斷是否存在此變數
    foreach($_POST['text2'] as $idx => $text){  //再做foreach
        
        if($text!=""){
            $Menu->save
            ([
            'text'=>$text,
            'href'=>$_POST['href2'][$idx], //此處[$idx]是確保'href'的值可以對應到$_POST['text2']中相同的key值
            'sh'=>1,
            'main_id'=>$main_id
            ]);
        }
    }
}
to('../backend.php?do=menu');
?>