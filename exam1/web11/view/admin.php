<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
  <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="46%">帳號</td>
                    <td width="46%">密碼</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $this->all();
                foreach ($rows as $row) {
                ?>
                    <tr>

                        <td>
                            <input type="text" name="acc[<?= $row['id'] ?>]" value="<?= $row['acc'] ?>" style='width:95%'>
                        </td>
                        <td>
                            <input type="password" name="pw[<?= $row['id'] ?>]" value="<?= $row['pw']?>" style='width:95%'>
                        </td>
                        <td>
                            <input type="checkbox" name="del[<?= $row['id'] ?>]" value="<?= $row['id']?>">
                        </td>
                        <td>

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
                    <input type="hidden" name="table" value="<?=$this->table?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./model/add_form.php?table=<?=$this->table?>')" value="新增管理者帳號"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
    </div>