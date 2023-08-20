<?php include_once "../base.php";
dd($_POST);
if(isset($_POST['subject'])){
    $Que->save([
        'text'=>$_POST['subject'],
        'vote'=>0,
        'subject_id'=>0
    ]);

    if(isset($_POST['option'])){
        $sub_id = $Que->find(['text'=>$_POST['subject']])['id'];
        foreach($_POST['option'] as $opt){
            $Que->save([
                'text'=>$opt,
                'vote'=>0,
                'subject_id'=>$sub_id
            ]);
        }
    }
}
to("../backend.php?do=que");