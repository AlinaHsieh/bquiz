<?php
include_once "../base.php";
?>
<h3 class="cent">編輯次選單</h3>
<hr>
<form action="./api/submenu.php" method="post">
<table>
    <tr>
        <td>次選單名稱</td>
        <td>次選單連結網址</td>
        <td>刪除</td>
    </tr>
    <?php
    //  撈出資料的語法：select * from `menu` where `main_id` = $_GET['main_id'];
    $rows = $Menu->all(['main_id'=>$_GET['main_id']]);
    foreach($rows as $row){
    ?>
    <tr>
        <td><input type="text" name="text[<?=$row['id']?>]" value="<?=$row['text']?>"></td>
        <td><input type="text" name="href[<?=$row['id']?>]" value="<?=$row['href']?>"></td>
        <td><input type="checkbox" name="del[<?=$row['id']?>]" value="<?=$row['id']?>"></td>
    </tr>
    <?php
    }
    ?>
</table>
<div>
    <input type="submit" value="修改確定">
    <input type="reset" value="重置">
    <input type="button" value="更多次選單">
</div>
</form>

