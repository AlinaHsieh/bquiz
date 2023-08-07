<?php
$table = $_GET['do'];
$db = ucfirst($table);
?>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$$db->header?></p>
    <form method="post" action="./api/update_form.php" enctype="multipart/form-data">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">動態文字廣告</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>

                <?php
                $rows = $$db->all();
                foreach($rows as $row){
                ?>
                <tr class="">
                    <td width="23%"><input type="text" name="text[<?=$row['id'];?>]" value="<?=$row['text'];?>" style="width:95%"></td>
                    <td width="7%"><input type="checkbox" name="sh[<?=$row['id'];?>]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'' ?>></td>
                    <td width="7%"><input type="checkbox" name="del[<?=$row['id'];?>]" value="<?=$row['id'];?>"></td>
                    <input type="hidden" name="id[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    <input type="hidden" name="table" value="<?=$table?>">
                    <td></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_form.php?table=<?=$table?>')" value="<?=$$db->add_header?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>