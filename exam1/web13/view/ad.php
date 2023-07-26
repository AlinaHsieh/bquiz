<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
    <form method="post" action="?do=tii">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">動態文字廣告</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $rows = $this->all();
                foreach ($rows as $row) {
                ?>
                    <tr class="">
                        <td width="80%"><input type="text" value="<?=$row['text']?>" style="width:95%"></td>
                        <td width="10%"><input type="radio" name="sh[<?=$row['id']?>]" <?=$row['sh']==1?"checked":"" ?> ></td>
                        <td width="10%"><input type="checkbox" name="del[<?=$row['id']?>]"></td>
                    </tr>
                <?php
                }

                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_ad.php')" value="新增動態文字廣告"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>