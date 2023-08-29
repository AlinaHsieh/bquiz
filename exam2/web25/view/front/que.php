<fieldset>
    <legend>目前位置：首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td>編號</td>
            <td>問卷題目</td>
            <td>投票總數</td>
            <td>結果</td>
            <td>狀態</td>
        </tr>
      <?php
    $rows = $Que->all(['subject_id'=>0]);
    foreach($rows as $idx => $row){
      ?>
       <tr>
            <td><?=$idx+1?></td>
            <td><?=$row['text']?></td>
            <td></td>
            <td><a href="?do=result&id=<?=$row['id']?>">結果</a></td>
            <td>
            <?php
            if(isset($_SESSION['acc'])){
                echo "<input type='submit' value=我要投票'>";
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