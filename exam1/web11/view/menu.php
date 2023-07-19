<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="35%">主選單名稱</td>
                    <td width="35%">選單連結網址</td>
                    <td width="10%">次選單數</td>
                    <td width="5%">顯示</td>
                    <td width="5%">刪除</td>
                    <td width="10%"></td>

                    <td></td>
                </tr>
                <?php
                $rows = $this->all(['main_id'=>0]);
                // dd($rows);
                foreach ($rows as $row) {
                ?>
                    <tr>

                        <td>
                            <input type="text" name="text[<?= $row['id'] ?>]" value="<?= $row['text'] ?>" style='width:95%'>
                        </td>
                        <td>
                            <input type="text" name="href[<?= $row['id'] ?>]" value="<?= $row['href'] ?>" style='width:95%'>
                        </td>
                        <td style="text-align:center">
                            <?=$this->count(['main_id'=>$row['id']])?>
                        </td>
                        <td>
                            <input type="checkbox" name="sh[<?= $row['id'] ?>]" value="<?= $row['id'] ?>" <?= ($row['sh'] == 1) ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[<?= $row['id'] ?>]" value="<?= $row['id'] ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./model/edit_submenu.php?main_id=<?=$row['id']?>')"  value="編輯次選單">
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $this->table ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./model/add_form.php?table=<?= $this->table ?>')" value="新增選單"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>