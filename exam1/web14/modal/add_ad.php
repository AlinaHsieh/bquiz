<?php include_once "../base.php"; ?>
<h2><?= $Ad->add_header ?></h2>
<hr>
<form action="./api/add_ad.php" method="post" enctype="multipart/form-data">
    <table>

        <tr>
            <td>動態文字廣告</td>
            <td><input type="text" name="text"></td>
        </tr>
        <tr>
            <input type="hidden" name="table" value="ad">
            <td><input type="submit" value="新增"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>