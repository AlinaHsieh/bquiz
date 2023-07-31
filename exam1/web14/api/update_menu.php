<?php include_once "../base.php";
dd($_POST);
if(isset($_POST['text'])){
    foreach($_POST['text'] as $id=>$text){
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $Menu->del($id);
        }else{
            $row = $Menu->find($id);
            dd($row);
            $row['text'] = $text;
            $row['href'] = $_POST['href'][$id];
            $row['sh'] = (isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
            $Menu->save($row);
        }
    }
}
to("../backend.php?do=menu");