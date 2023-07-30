<?php include_once "../base.php"; ?>
<h2><?= $Title->add_header ?></h2>
<hr>
<form action="./api/add_news.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>最新消息文字：</td>
        <td><textarea name="text" style="width:300px; height:100px"></textarea></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="news">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>
    </tr>
</table>
</form>