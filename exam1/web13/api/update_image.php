<?php
include_once "../base.php";
dd($_POST);
// $id = $_POST['id'];
foreach ($_POST['id'] as $id) {
    if(isset($_POST['del'])){
        if (!empty($_POST['del'] && in_array($id, $_POST['del']))) {
            $Image->del($id);
        }
    }else{
        $row = $Image->find($id);
        $row['sh'] = (!empty($_POST['sh']) && in_array($id,$_POST['sh'])) ? 1:0;
        $Image->save($row);
    }    
}
to('../backend.php?do=image');
