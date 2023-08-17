<?php include_once "../base.php";
$opt = $Que->find($_POST['opt']);
$opt['vote']++;
$Que->save($opt);
$subject = $Que->find($opt['subject_id']); //找到主題id
$subject['vote']++; //主題票數統計加一
$Que->save($subject);

to("../index.php?do=result&id={$subject['id']}");