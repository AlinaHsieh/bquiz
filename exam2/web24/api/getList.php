<?php include_once "../base.php";
//get得到type值
// dd($_GET);
$rows = $News->all(['type'=>$_GET['type']]);
foreach($rows as $row){
    echo "<div>";
    echo "<a href='Javascript:getPost({$row['id']})'>{$row['title']}</a>";
    echo "</div>";
}
?>
