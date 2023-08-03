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
                    <td width="80%">最新消息文字</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>    
                </tr>

                <?php
                $rows = $this->all();
                foreach($rows as $row){
                    // dd($row);
                ?>
                <tr class="">
                    <td ><textarea name="text[<?=$row['id']?>]" style="width:95% ;height:100px"><?=$row['text']?></textarea></td>
                    <td ><input type="checkbox" name="sh[<?=$row['id']?>]" value="<?=$row['id']?>" <?=$row['sh']==1?"checked":""?>></td>
                    <td ><input type="checkbox" name="del[<?=$row['id']?>]" value="<?=$row['id']?>"></td>
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