<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header; ?></p>
    <form method="post" action="./api/update_image.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="65%">校園映像圖片圖片</td>
                    <td width="8%">顯示</td>
                    <td width="8%">刪除</td>
                    <td></td>
                </tr>
                <?php
                $rows = $this->paginate(3);
                foreach ($rows as $row) {

                ?>
                    <tr class="">
                        <td width="45%"><img src="./upload/<?= $row['img']; ?>" width="120px" height="80px"></td>
                        <td width="7%"><input type="checkbox" name="sh[<?= $row['id']; ?>]" value="<?= $row['id'];?>" <?=$row['sh']==1?"checked":"";?>></td>
                        <td width="7%"><input type="checkbox" name="del[<?= $row['id']; ?>]" value="<?= $row['id']; ?>"></td>
                        <input type="hidden" name="id[<?= $row['id']; ?>]" value="<?= $row['id']; ?>">
                        <td><button>更換動畫</button></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
         <div style="text-align:center">
            <?php
            echo $this->links();
            ?>
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="image">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_image.php')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置">
                    </td>
                </tr>
            </tbody>
        </table>
       
    </form>
</div>