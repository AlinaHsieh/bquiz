<?php include_once "../base.php";
// dd($_GET);
$rows = $News->all(['type'=>$_GET['data']]);
foreach($rows as $row){
    echo "<div>";
    echo "<a href='Javascript:getPost({$row['id']})'>{$row['title']}</a>";
    echo "</div>";
}