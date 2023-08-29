<?php
$row = $Que->find($_GET['id']);
$options = $Que->all(['subject_id' => $_GET['id']]);

?>

<fieldset>
    <form action="./api/vote.php" method="post">
        <legend>目前位置：首頁 > 問卷調查 > <span><?= $row['text'] ?></span></legend>
        <p><?= $row['text'] ?></p>
        <?php
        foreach ($options as $opt) {
        ?>
            <div>
                <input type="radio" name="id" value="<?= $opt['id'] ?>">
                <?= $opt['text'] ?>
            </div>
        <?php
        }
        ?>
        <div class="ct"><input type="submit" value="我要投票"></div>
    </form>

</fieldset>