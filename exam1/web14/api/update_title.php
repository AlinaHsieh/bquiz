<?php include_once "../base.php";
dd($_POST);

foreach($_POST['text'] as $id => $text){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Title->del($id);
    }else{
        $row = $Title->find($id);
        $row['sh'] = ($_POST['sh']==$id)?1:0;
        $row['text'] = $text;
        $Title->save($row);
    }
}
to("../backend.php?do=title");