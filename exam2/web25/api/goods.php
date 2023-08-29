<?php include_once "../base.php";
// dd($_POST);
$news = $News->find($_POST['news']);
switch($_POST['type']){
    case "1":
        $news['goods']++;
        $News->save($news);
        break;
    case "2":
        $news['goods']--;
        $News->save($news);
        break; 
}
$Logs->save([
    'user'=>$_SESSION['user'],
    'news'=>$news['id']
]);

