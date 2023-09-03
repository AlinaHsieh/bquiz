<?php include_once "../base.php";
dd($_GET);
$rows = $Type->all(['big'=>$_GET['id']]);
foreach($rows as $row){
    echo "<option value='{$row['id']}'>{$row['name']}</option>";
}