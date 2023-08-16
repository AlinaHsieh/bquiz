<?php include_once "../base.php";

$type = $_POST['type']; //根據type判斷新增log or刪除log資料
unset($_POST['type']); //在拿到type資料後，unset($_POST['type'])因資料庫沒有該欄位，會出錯
$_POST['user'] = $_SESSION['user']; //除了前端傳來的new文章id跟type(按讚or收回讚)，後端還要根據session判斷是哪位user
$news = $News->find($_POST['news']); //找出文章統計讚數

switch ($type){
    case 1:
        $Log->save($_POST);
        $news['goods']++;
    break;
    case 2:
        $Log->del($_POST);
        $news['goods']--;

    break;
}
$News->save($news);