<form action="./api/news.php" method="post">
    <table>
        <tr>
            <td style="width:10%">編號</td>
            <td style="width:60%">標題</td>
            <td style="width:10%">顯示</td>
            <td style="width:10%">刪除</td>
        </tr>
        <tr>

            <?php
            $rows = $News->paginate(3);
            foreach ($rows as $idx => $row) {

            ?>
                <td><?= $idx + 1; ?></td>
                <td><?= $row['title']; ?></td>
                <td><input type="checkbox" name="sh[]" value="<?= $row['id']; ?>"<?=($row['sh']==1)?'checked':'';?>></td>
                <td><input type="checkbox" name="del[]" value="<?= $row['id']; ?>"></td>
                <input type="hidden" name="id[]" value="<?=$row['id']?>">
            </tr>
    <?php
            }
    ?>
    </table>
    <div class="ct"><?= $News->links(); ?></div>
    <div class="ct"><input type="submit" value="確定修改"></div>

</form>