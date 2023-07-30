<?php
include_once "../base.php";
dd($_POST);

$rows = $_POST['id'];
foreach($rows as $id =>$row){
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Image->del($id);
    }else{
        $row = $Image->find($id);
        $row['sh'] = (in_array($id,$_POST['sh']))?1:0;
        $Image->save($row);
    }
    }
to("../backend.php?do=image");