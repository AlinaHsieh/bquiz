<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header; ?></p>
    <form method="post" action="./api/update_ad.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="80%">替代文字</td>
                    <td width="10%">顯示</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $rows = $this->all();
                foreach ($rows as $row) {

                ?>
                    <tr class="">
                        <td width="23%"><input type="text" name="text[<?= $row['id']; ?>]" value="<?= $row['text']; ?> " style="width:95%"></td>
                        <td width="7%"><input type="checkbox" name="sh[<?= $row['id']; ?>]" value="<?= $row['id'];?>" <?=$row['sh']==1?"checked":"";?>  style="width:95%"></td>
                        <td width="7%"><input type="checkbox" name="del[<?= $row['id']; ?>]" value="<?= $row['id']; ?>"  style="width:95%"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="ad">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_ad.php')" value="<?=$this->add_header;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>