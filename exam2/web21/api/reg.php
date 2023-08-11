<?php include_once "../base.php";

unset($_POST['pw2']); //資料表沒有pw2欄位 寫入會有問題
$User->save($_POST);
