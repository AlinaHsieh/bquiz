<?php include_once "../base.php"; ?>
<h2><?= $Title->add_header ?></h2>
<hr>
<form action="./api/add_title.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>標題區圖片：</td>
        <td><input type="file" name="img"></td>
    </tr>
    <tr>
        <td>標題區替代文字：</td>
        <td><input type="text" name="text"></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="title">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>
    </tr>
</table>
</form>