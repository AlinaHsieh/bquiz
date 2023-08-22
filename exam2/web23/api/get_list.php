<?php include_once "../base.php";

$lists = $News->all(['type'=>$_GET['type']]);
foreach($lists as $list){
    echo "<div><a href='Javascript:getPost({$list['id']})'>";
    echo $list['title'];
    echo "</a></div>";
}