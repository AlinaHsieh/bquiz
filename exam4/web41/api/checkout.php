<?php include_once "../base.php";
$_POST['no']=date('Ymd').rand(100000,999999);
$_POST['acc']=$_SESSION['user'];
$_POST['orderdate']=date('Y-m-d');
$_POST['cart']=serialize($_SESSION['cart']);
// dd($_POST);

$Order->save($_POST);