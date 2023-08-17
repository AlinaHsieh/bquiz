<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr>
            <th>編號</th>
            <th width="50%">問卷題目</th>
            <th>投票總數</th>
            <th>結果</th>
            <th>狀態</th>
        </tr>
        <?php
        $subject = $Que->all(['subject_id'=>0]);
        foreach($subject as $idx => $subject){

        
        ?>
        <tr>
            <td><?=$idx+1?></td>
            <td><?=$subject['text']?></td>
            <td><?=$subject['vote']?></td>
            <td>
                <a href="?do=result&id=<?=$subject['id']?>">結果</a>
            </td>
            <td>
                <?php
                if(isset($_SESSION['user'])){
                    echo "<a href='?do=vote&id={$subject['id']}'>我要投票</a>";
                }else{
                    echo "請先登入";
                }
                ?>
            </td>
        </tr>

        <?php
        }
        ?>
    </table>
</fieldset>