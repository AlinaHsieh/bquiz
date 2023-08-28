<?php include_once "../base.php";
dd($_POST);
$subject = $Que->save(['text'=>$_POST['subject'],'subject_id'=>0]);
echo $subject;
$subject_id = $Que->find(['id'=>$subject]);
echo $subject_id;