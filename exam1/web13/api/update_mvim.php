<?php
include_once "../base.php";
dd($_POST);
//$rows = $Mvim->all();
// dd($rows);
foreach ($_POST['id'] as $id) {
    // dd($row);
    if (!empty($_POST['del']) && in_array($id, $_POST['del'])) {
        $Mvim->del($id);
    }else{
        $row=$Mvim->find($id);
        $row['sh'] = (!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
        $Mvim->save($row);
    }
}
to("../backend.php?do=mvim");
