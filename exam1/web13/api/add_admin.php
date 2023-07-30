<?php
include_once "../base.php";
// dd($_POST);
$data = [];
if(isset($_POST['acc'])){
    $data['acc'] = $_POST['acc'];
    $data['pw'] = $_POST['pw'];
$Admin->save($data);
    
}
to("../backend.php?do=admin");