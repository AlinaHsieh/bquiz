<?php
include_once "../base.php";
dd($_POST);
$data = [];
if(!empty($_POST['text'])){
    $data['text'] = $_POST['text'];
    $data['sh'] = 1;
    $News->save($data);
}
to("../backend.php?do=news");
