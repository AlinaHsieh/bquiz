<?php
include_once "../base.php";

// dd($_POST);

//文字的更新
foreach($_POST['text'] as $id => $text){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Title->del($id);
    }else{ //如果不是要刪除的，就有可能是要更新文字或是否顯示
        $row=$Title->find($id);  //先把資料撈出來
        $row['text']=$text; //把$_POST['text']的值賦值給 $row的text(資料庫)的欄位
        $row['sh']=($_POST['sh']==$id)?1:0; //若$_POST['sh']等於目前$id，表示是要顯示的，若不等於則為不顯示
        $Title->save($row);
    }
}
to("../backend.php");

?>