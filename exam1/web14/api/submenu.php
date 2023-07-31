<?php include_once "../base.php";

dd($_POST);
$main_id = $_POST['main_id'];

//新增次選單
if(isset($_POST['text2'])){
    foreach($_POST['text2'] as $idx =>$text){
        if($text!=""){
            $Menu->save([
                'text'=>$text,
                'href'=>$_POST['href2'][$idx],
                'sh'=>1,
                'main_id'=>$main_id
            ]);
        }
    }
}
//編輯次選單
if(isset($_POST['text'])){
    foreach($_POST['text'] as $idx => $text){
        if(isset($_POST['del']) && in_array($idx,$_POST['del'])){
            $Menu->del($idx);
        }else{
            $row = $Menu->find($idx);
            $row['text'] = $text;
            $row['href'] = $_POST['href'][$idx];
            // $row['sh'] = (isset($_POST['sh']) && in_array($_POST['sh']))?1:0;
            $Menu->save($row);
        }
    }
}
to("../backend.php?do=menu");