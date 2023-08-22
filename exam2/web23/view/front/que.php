<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td width="5%">編號</td>
            <td width="65%">問卷題目</td>
            <td width="5%">投票總數</td>
            <td width="15%">結果</td>
            <td width="10%">狀態</td>
        </tr>
        <?php
        $rows = $Que->all(['subject_id'=>0]);
        foreach($rows as $id =>$row){
        ?>
        <tr>
            <td><?=$id+1;?></td>
            <td><?=$row['text'];?></td>
            <td><?=$row['vote'];?></td>
            <td><a href="#">結果</a></td>
            <td>
                <?php
                if(isset($_SESSION['user'])){
                    echo "<a href='?do=vote&id={$row['id']}'>我要投票</a>";
                }else{
                    echo "<a href='?do=login'>請先登入</a>";
                }
                ?>
            </td>
        </tr>
        <?php
        }
        ?>
    </table>
</fieldset>