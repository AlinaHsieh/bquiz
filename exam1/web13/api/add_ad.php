<?php 
include_once "../base.php";
// dd($_POST);
$data =[];
$data['text'] = $_POST['text'];
$data['sh'] = 1;
// dd($data);
if(!empty($data['text'])){
    $Ad->save($data);
    to("../backend.php?do=ad");
}else{
    to("../backend.php?do=ad");
}