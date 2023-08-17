<?php
// $subject = $Que->find($_GET['id']);
// print_r($subject);
// $options = $Que->all(['subject_id'=>$subject])
$subject = $Que->subject($_GET['id']);
// dd($subject);

?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查<?= $subject['text']; ?></legend>
    <h3><?= $subject['text']; ?></h3>
    <?php
    foreach ($subject['options'] as $option) {
        // echo $option['text']  ; 
        $total = ($subject['vote']==0)?1:$subject['vote']; //排除沒人投票時分母為0的狀況
        $rate = ($option['vote']/$total);
    ?>
    <p>
        <div style="display:flex;">
            <div style="width:40%"><?= $option['text'];?></div>
            <div style="width:<?=40*$rate?>%;background:gray;height:25px;"></div>
            <div style=""><?= $option['vote'];?>票(<?=round($rate*100)?>%)</div>
        </div>
     </p>
    <?php
    }
    ?>
</fieldset>