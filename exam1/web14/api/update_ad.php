<?php
include_once "../base.php";
// dd($_POST);
if(isset($_POST['text'])){
    foreach($_POST['text'] as $id =>$text){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $Ad->del($id);
        }else{
            $row = $Ad->find($id);
            $row['text'] = $text;
            $row['sh'] = in_array($id,$_POST['sh'])?1:0;
            $Ad->save($row);
        }

    }
}
to("../backend.php?do=ad");