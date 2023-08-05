<?php
$table = $_GET['do'];
$db = ucfirst($table);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
    <form method="post" action="./api/update_form.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="34%">主選單名稱</td>
                    <td width="34%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $rows = $this->all(['main_id'=>0]);
                foreach($rows as $row){
                ?>
                <tr class="">
                    <td ><input type="text" name="text[<?=$row['id']?>]" value="<?=$row['text']?>"></td>
                    <td ><input type="text" name="href[<?=$row['id']?>]" value="<?=$row['href']?>"></td>
                    <td ></td>
                    <td ><input type="checkbox" name="sh[<?=$row['id']?>]" value="<?=$row['id']?>" <?=$row['sh']==1?"checked":""?>></td>
                    <td ><input type="checkbox" name="del[<?=$row['id']?>]" value="<?=$row['id']?>"></td>
                    <td><input type="button" onclick="op('#cover','#cvr','./modal/edit_submenu.php?main_id=<?=$row['id']?>')" value="編輯次選單"></td>
                    <input type="hidden" name="id[<?=$row['id']?>]" value="[<?=$row['id']?>]">
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_form.php?table=<?= $this->table ?>')" value="<?= $this->add_header ?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    <input type="hidden" name="table" value=<?= $this->table ?>>
                </tr>
            </tbody>
        </table>

    </form>
</div>