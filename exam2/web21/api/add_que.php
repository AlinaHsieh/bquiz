<?php include_once "../base.php";
dd($_POST);
if(isset($_POST['subject'])){
    $Que->save([
        'text'=>$_POST['subject'],
        'vote'=>0,
        'subject_id'=>0
    ]);

    if(isset($_POST['option'])){
        $subject_id = $Que->find(['text'=>$_POST['subject']])['id'];
        echo $subject_id;
        foreach($_POST['option'] as $option){
            $Que->save([
                'text'=>$option,
                'vote'=>0,
                'subject_id'=>$subject_id
            ]);
        }
    }

}
to("../backend.php?do=que");