<?php include_once "../base.php";
dd($_POST);

$rows = $_POST['id'];
foreach($rows as $id => $row){
// dd($row);
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $Mvim->del($id);
    }else{
        $row = $Mvim->find($id);
        $row['sh'] = (in_array($id,$_POST['sh']))?1:0;
        $Mvim->save($row);
    }
}
to("../backend.php?do=mvim");