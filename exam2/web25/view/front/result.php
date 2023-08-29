<?php
$row = $Que->find($_GET['id']);
$subject = $Que->find($row['subject_id']);
$opts = $Que->all(['subject_id' => $row['subject_id']]);

?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <span><?= $subject['text'] ?></span></legend>
    <p><?= $row['text'] ?></p>
    <?php
    foreach ($opts as $opt) {
        $total = $Que->sum('vote',['subject_id' => $row['subject_id']]);
        $num = $opt['vote'];

    ?>
        <table>
            <tr>
                <td style="width: 40%;"><?= $opt['text'] ?></td>
                <td style="width: <?=($num/$total)*40?>%; background-color:lightgray; height: 15px;"></td>
                <td style="width: 19%;"><?= $opt['vote'] ?>票 <?=round($num/$total*100)?>%</td>
            </tr>
        </table>

    <?php
    }
    ?>

</fieldset>