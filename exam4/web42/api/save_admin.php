<?php include_once "../base.php";
// dd($_POST);
$_POST['pr']= serialize($_POST['pr']);

$Admin->save($_POST);
to("../backend.php?do=admin");