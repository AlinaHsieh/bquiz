<h2>頁尾版權資料管理</h2>
<hr>
<form action="./api/update_one.php" method="post">
    <table>
        <?php
        $row = $this->find(1);
        ?>
        <tr>
            <td>頁尾版權資料：</td>
            <td><input type="text" name="bottom" value="<?=$row['bottom'];?>"></td>
        </tr>
        <tr>
            <input type="hidden" name="table" value="bottom">
            <td><input type="submit" value="修改確定"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>