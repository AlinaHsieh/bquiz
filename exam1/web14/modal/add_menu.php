<?php include_once "../base.php"; ?>
<h2><?= $Menu->add_header ?></h2>
<hr>
<form action="./api/add_menu.php" method="post" enctype="multipart/form-data">
<table>
   
    <tr>
        <td>主選單名稱：</td>
        <td><input type="text" name="text"></td>
    </tr>
    <tr>
        <td>選單連結網址：</td>
        <td><input type="text" name="href"></td>
    </tr>
    
    <tr>
        <input type="hidden" name="table" value="menu">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>
    </tr>
</table>
</form>