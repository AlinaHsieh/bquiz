<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header; ?></p>
    <form method="post" action="./api/update_admin.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="40%">帳號</td>
                    <td width="40%">密碼</td>
                    <td width="10%">刪除</td>
                </tr>
                <?php
                $rows = $this->all();
                foreach ($rows as $row) {

                ?>
                    <tr class="">
                        <td width=""><input type="text" name="acc[<?= $row['id']; ?>]" value="<?= $row['acc']; ?> " style="width:95%"></td>
                        <td width=""><input type="password" name="pw[<?= $row['id']; ?>]" value="<?= $row['pw'];?>" style="width:95%"></td>
                        <td width=""><input type="checkbox" name="del[<?= $row['id']; ?>]" value="<?= $row['id']; ?>"  style="width:95%"></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="admin">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_admin.php')" value="<?=$this->add_header;?>"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>

    </form>
</div>