<?php
include_once "../base.php";
$main_id = $_POST['main_id'];
// echo $_POST['main_id'];
// dd($_POST['text2']);
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $idx => $text){  
        if($text!=""){
            $Menu->save([
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