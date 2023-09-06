<?php include_once "../base.php";
dd($_POST);
$mids = $Type->all(['big'=>$_POST['id']]);
foreach($mids as $mid){
    echo "<option value='{$mid['id']}'>{$mid['name']}</option>";
}