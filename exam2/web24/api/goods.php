<?php include_once "../base.php";
// dd($_GET);
$news = $News->find($_GET['news']);
switch($_GET['type']){
    case 1:
        $Log->save([
            'user'=>$_SESSION['user'],
            'news'=>$_GET['news'],
        ]);
        $news['good']++;
    break;
    case 2:
        $Log->del([
            'user'=>$_SESSION['user'],
            'news'=>$_GET['news'],
        ]);
        $news['good']--;
    break;
}
$News->save($news);
