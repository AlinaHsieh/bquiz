<?php
// $subject = $Que->find($_GET['id']);
// print_r($subject);
// $options = $Que->all(['subject_id'=>$subject])
$subject = $Que->subject($_GET['id']);
// dd($subject);

?>
<fieldset>
    <legend>目前位置：首頁 > 問卷調查<?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <form action="./api/vote.php" method="post">
    <?php
    foreach($subject['options'] as $option){
        // echo $option['text']  ;  
    ?>
    <p>
        <input type="radio" name="opt" value="<?=$option['id'];?>">
        <span><?=$option['text'];?></span>
    </p>
    <?php
    }
    ?>
    <input type="submit" value="我要投票">
    </form>
</fieldset>