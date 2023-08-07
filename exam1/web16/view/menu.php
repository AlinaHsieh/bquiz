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
                    <td width="35%">主選單名稱</td>
                    <td width="35%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td></td>
                </tr>

                <?php
                $rows = $$db->all(['main_id'=>0]);
                foreach($rows as $row){
                ?>
                <tr class="">
                    <td><input type="text" name="text[<?=$row['id'];?>]" value="<?=$row['text'];?>" style='width:95%'></td>
                    <td><input type="text" name="href[<?=$row['id'];?>]" value="<?=$row['href'];?>" style='width:95%'></td>
                    <td></td>
                    <td><input type="checkbox" name="sh[<?=$row['id'];?>]" value="<?=$row['id'];?>"<?=($row['sh']==1)?'checked':'' ?>></td>
                    <td><input type="checkbox" name="del[<?=$row['id'];?>]" value="<?=$row['id'];?>"></td>
                    <td><input type="button" value="編輯次選單" onclick="op('#cover','#cvr','./modal/edit_sub.php?table=<?=$table?>&main_id=<?=$row['id'];?>')"></td>
                    <input type="hidden" name="id[<?=$row['id'];?>]" value="<?=$row['id'];?>">
                    <input type="hidden" name="table" value="<?=$table?>">
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