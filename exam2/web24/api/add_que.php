<?php include_once "../base.php";
dd($_POST);
if (!empty($_POST['subject'])) {
    $Que->save([
        'text' => $_POST['subject'],
        'vote' => 0,
        'subject_id' => 0
    ]);
    if (!empty($_POST['option'])) {
        $row = $Que->find(['text' => $_POST['subject']]);
        dd($row);
        foreach ($_POST['option'] as $opt) {
            $Que->save([
                'text' => $opt,
                'vote' => 0,
                'subject_id' => $row['id']
            ]);
        }
    }
}
to("../backend.php?do=que");