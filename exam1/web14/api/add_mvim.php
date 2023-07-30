<?php
include_once "../base.php";
// dd($_POST);
$data = [];
if(!empty($_FILES['img']['tmp_name'])){
    $data['img'] = $_FILES['img']['name'];
    move_uploaded_file($_FILES['img']['tmp_name'],"../upload/" . $_FILES['img']['name']);
    $data['sh'] = 1;
    $Mvim->save($data);
}
to("../backend.php?do=mvim");