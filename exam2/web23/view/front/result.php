<?php
$subject = $Que->subject($_GET['id']);
?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查 > <?= $subject['text']; ?></legend>
    <div><?= $subject['text']; ?></div>
    <?php
    // dd($subject);
    foreach ($subject['options'] as $opt) {
        $total = ($subject['vote'] == 0) ? 1 : $subject['vote'];
        $rate = ($opt['vote'] / $total);
    ?>
    <p>
        <div style="display:flex">
            <div style="width:40%"><?=$opt['text'];?></div>
            <div style="width:<?=40*$rate?>%;background:gray;height:25px"></div>
            <div style="width:''"><?=$opt['vote'];?>票(<?=round($rate*100)?>%)</div>
        </div>
    </p>
    <?php
    }
    ?>
</fieldset>