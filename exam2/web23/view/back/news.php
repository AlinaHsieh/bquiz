<form action="./api/news_admin.php" method="post">
    <table class="ct">
        <tr>
            <td width="6%" >標題</td>
            <td width="82%" >編號</td>
            <td width="6%" >顯示</td>
            <td width="6%" >刪除</td>
        </tr>
        <?php
        foreach($rows as $idx => $row){
        ?>
        <tr>
            <td width="6%"><?=$start+$idx+1;?></td>
            <td width="82%"><?=$row['title'];?></td>
            <td width="6%">
                <input type="checkbox" name="sh[]" value="<?=$row['id'];?>" id=""<?=(($row['sh']==1)?'checked':'');?>>
            </td>
            <td width="6%">
                <input type="checkbox" name="del[]" value="<?=$row['id'];?>" id="">
            </td>
            <input type="hidden" name="id[]" value="<?=$row['id'];?>">
        </tr>
        <?php
        }
        ?>
    </table>
<div class="ct">
    <?=$links;?>
</div>
<div class="ct">
<input type="submit" value="確定修改">
</div>


</form>