<?php
// $table = $_GET['do'];
// $db = ucfirst($table);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
    <form method="post" action="./api/update_form.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="45%">網站標題</td>
                    <td width="23%">替代文字</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $rows = $this->all();
                foreach($rows as $row){
                ?>
                <tr class="">
                    <td width="45%"><img src="./upload/<?=$row['img']?>" style="width:300px;height:30px"></td>
                    <td width="23%"><input type="text" name="text[<?=$row['id']?>]" value="<?=$row['text']?>"></td>
                    <td width="7%"><input type="radio" name="sh" value="<?=$row['id']?>" <?=$row['sh']==1?"checked":""?>></td>
                    <td width="7%"><input type="checkbox" name="del[<?=$row['id']?>]" value="<?=$row['id']?>"></td>
                    <td></td>
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