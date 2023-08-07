<?php 
include_once "../base.php"; 
$table = $_GET['table'];
$db = ucfirst($table);

// dd($_GET);
?>

<h2><?=$$db->add_header?></h2>
<hr>
<form action="../api/add_form.php" method="post" enctype="multipart/form-data">
    <table>
        <?php
        $$db->add_form();
        ?>
        <tr>
            <td><input type="submit" value="新增"><input type="reset" value="重置"></td>
            <input type="hidden" name="table" value="<?=$table?>">
        </tr>
    </table>
</form>
