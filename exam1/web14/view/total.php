<h2>進站總人數管理</h2>
<hr>
<form action="./api/update_one.php" method="post">
    <table>
        <?php
        $row = $this->find(1);
        ?>
        <tr>
            <td>進站總人數：</td>
            <td><input type="text" name="total" value="<?=$row['total'];?>"></td>
        </tr>
        <tr>
            <input type="hidden" name="table" value="total">
            <td><input type="submit" value="修改確定"></td>
            <td><input type="reset" value="重置"></td>
        </tr>
    </table>
</form>