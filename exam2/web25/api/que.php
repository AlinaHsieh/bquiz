<?php include_once "../base.php";
dd($_POST);
$Que->save(['text'=>$_POST['subject'],'subject_id'=>0]);
$sub_id = $Que->find(['text'=>$_POST['subject']])['id'];
foreach($_POST['opt'] as $opt){
    $Que->save([
        'text'=>$opt,
        'subject_id'=>$sub_id
    ]);
}
to("../backend.php?do=que");