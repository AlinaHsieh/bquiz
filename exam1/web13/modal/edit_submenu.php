<?php include_once "../base.php"; ?>
<h2>編輯次選單<?=$_GET['main_id'];?></h2>
<hr>
<form action="./api/submenu.php" method="post" enctype="multipart/form-data">
<table id="sub">
    <tr>
        <td>次選單名稱：</td>
        <td>次選單連結網址：</td>
        <td>刪除：</td>
    </tr>
    <?php
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
    <tr>
        <input type="hidden" name="main_id" value="<?=$_GET['main_id'];?>">
        <td><input type="submit" value="修改確定"></td>
        <td><input type="button" value="更多次選單" onclick="more()"></td>
        <td><input type="reset" value="重置"></td>

    </tr>
</table>
</form>
<script>
    function more(){
        let input = `<tr>
        <td><input type="text" name="text2[]" value=""></td>
        <td><input type="text" name="href2[]" value=""></td>
        <td><input type="checkbox" name="del2[]" value=""></td>
        </tr>`
        $('#sub').append(input);
    }
</script>