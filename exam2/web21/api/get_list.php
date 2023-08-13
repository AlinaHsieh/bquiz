<?php include_once "../base.php";

$posts = $News->all(['type'=>$_GET['type']]);
foreach($posts as $post){
    echo "<div><a href='Javascript:getPost({$post['id']})'>"; //叫Javascript執行getPost(), 參數丟到前端(可以去Element查看)
    echo $post['title'];
    echo "</a></div>";
}