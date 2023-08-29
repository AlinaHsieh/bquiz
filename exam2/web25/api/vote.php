<?php include_once "../base.php";
dd($_POST);
$row = $Que->find($_POST['id']);
$row['vote']++;
$Que->save($row);

to("../index.php?do=result&id={$_POST['id']}");