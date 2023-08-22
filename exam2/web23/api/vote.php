<?php include_once "../base.php";
// dd($_POST);
$opt = $Que->find($_POST['opt']);
dd($opt);
$opt['vote']++;
$Que->save($opt);

$subject= $Que->find(['subject_id'=>$opt['subject_id']]);
dd($subject);
$subject['vote']++;
$Que->save($subject);

to("../index.php?do=result&id={$subject['id']}");