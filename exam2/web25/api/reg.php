<?php include_once "../base.php";
unset($_POST['pw2']);
dd($_POST);
$User->save($_POST);
