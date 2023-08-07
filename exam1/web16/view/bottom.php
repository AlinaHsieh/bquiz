<?php
$table = $_GET['do'];
$db = ucfirst($table);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$$db->header?></p>
    <form method="post" action="./api/update_single.php" enctype="multipart/form-data">
        <table width="50%">
            <tbody>
                <tr class="">
                    <td width="45%">頁尾版權資料</td>
                    <td width="23%"><input type="text" name="bottom" value="<?=$$db->find(1)['bottom']?>"></td>
                    <input type="hidden" name="table" value="<?=$table?>">
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>