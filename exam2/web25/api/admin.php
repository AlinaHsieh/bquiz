<?php include_once "../base.php";
dd($_POST);
if(isset($_POST['del'])){
    foreach($_POST['del'] as $key =>$id){
        $User->del($id);
    }
}
to("../backend.php?do=admin");