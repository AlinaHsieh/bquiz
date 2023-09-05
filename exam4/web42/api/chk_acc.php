<?php include_once "../base.php";
// dd($_POST);
echo $User->count(['acc'=>$_POST['acc']]);