<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$this->header?></p>
    <form method="post" action="./api/update_image.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%">校園映像資料圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td width=""></td>
                </tr>
                <?php
                $rows= $this->all();
                foreach($rows as $row){
                ?>
                   <tr class="">
                    <td width="68%"><img src="./upload/<?=$row['img']?>" alt="" style="width:150px"></td>
                    <td width="7%"><input type="checkbox" name="sh[<?=$row['id']?>]" value="<?=$row['id'];?>" <?=$row['sh']==1?"checked":""?>></td>
                    <td width="7%"><input type="checkbox" name="del[<?=$row['id']?>]" value="<?=$row['id'];?>" ></td>
                    <td width=""></td>
                    <input type="hidden" name="id[]" value="<?=$row['id'];?>"> 
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./modal/add_image.php')" value="新增校園映像圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                    <input type="hidden" name="table" value="image">
                </tr>
            </tbody>
        </table>

    </form>
</div>