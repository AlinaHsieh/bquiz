<?php include_once "../base.php";
dd($_POST);
foreach($_POST['text'] as $id =>$text){

    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Title->del($id);
    }else{
        $row = $Title->find($id); //先撈出資料庫的資料
        $row['text'] = $text;  //用$_POST['text']蓋過去
        $row['sh'] = ($_POST['sh']==$id)?1:0; 
        $Title->save($row);
    }
}
to("../backend.php?do=title");

?>