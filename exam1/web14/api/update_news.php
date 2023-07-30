<?php
include_once "../base.php";
dd($_POST);
if(isset($_POST['text'])){
    foreach($_POST['text'] as $id => $text){
       if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
       }else{
        $row = $News->find($id);
        $row['text'] = $text;
        $row['sh'] = (in_array($id,$_POST['sh']))?1:0;
        $News->save($row);
       }
    }
}
to("../backend.php?do=news");