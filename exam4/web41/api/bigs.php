<?php include_once "../base.php";
// echo dd($_POST);
$rows = $Type->all(['big'=>0]);
foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}