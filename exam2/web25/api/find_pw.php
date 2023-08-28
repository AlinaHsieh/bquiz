<?php include_once "../base.php";
// dd($_POST);
$chk = $User->count(['email' => $_POST['email']]);
if ($chk > 0) {
    $row = $User->find(['email' => $_POST['email']]);
    echo "您的密碼為" . $row['pw'];
}else{
    echo "查無此帳號";
}
