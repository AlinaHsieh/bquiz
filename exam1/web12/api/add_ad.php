<?php 
include_once "../base.php";
$data = [];
$data['text'] = $_POST['text'];
$data['sh']=0;

$Ad->save($data);
to('../backend.php?do=ad');

