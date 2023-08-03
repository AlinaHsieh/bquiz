<?php
$table = $_GET['do'];
$db = ucfirst($table);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
    <form method="post" action="./api/update_single.php">
        <table width="50%">
        <?php
                $row = $this->find(1);
                ?>
            <tbody>
                <tr class="">
                    <td width="50%" class="yel">頁尾版權資料</td>
                    <td ><input type="text" name="bottom" value="<?=$row['bottom']?>"></td>   
                </tr>

            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    <input type="hidden" name="table" value=<?= $this->table ?>>
                </tr>
            </tbody>
        </table>

    </form>
</div>