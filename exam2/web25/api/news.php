<?php include_once "../base.php";
dd($_POST);
if (isset($_POST['id'])){
    foreach ($_POST['id'] as $id) {
        if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
            $News->del($id);
        }else {
            $row = $News->find($id);
            // dd($row);
            $row['sh']=(isset($_POST['sh'])&& in_array($id,$_POST['sh']))?1:0;
            $News->save($row);
        }
    }
}
to("../backend.php?do=news");
