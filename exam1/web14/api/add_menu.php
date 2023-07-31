<?php include_once "../base.php";
dd($_POST);
$data=[];
if(!empty($_POST['text'])){
    $data['text'] = $_POST['text'];
    $data['href'] = $_POST['href'];
    $data['sh'] = 1;
    $data['main_id'] = 0;
    $Menu->save($data);
}
to("../backend.php?do=menu");