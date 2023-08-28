<form action="./api/news_admin.php" method="post">
    <?php
// dd($rows);
    ?>
    <table>
        <tr>
            <td style="width:10%;">編號</td>
            <td style="width:70%;">標題</td>
            <td style="width:10%;">顯示</td>
            <td style="width:5%;">刪除</td>
        </tr>
        <?php
        foreach($rows as $idx =>$row){

        ?>
        <tr>
            <td><?=$start+$idx+1;?></td>
            <td><?=$row['title'];?></td>
            <td><input type="checkbox" name="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1?'checked':'');?>></td>
            <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
            <input type="hidden" name="id[]" value="<?=$row['id']?>">
        </tr>
        <?php
        }
        ?>
    </table>
        <div class="ct"><?=$links;?></div>
        <input type="submit" value="確定修改">
</form>