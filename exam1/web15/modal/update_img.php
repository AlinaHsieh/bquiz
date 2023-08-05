<?php include_once "../base.php";
dd($_GET);
$table = $_GET['table'];
$db = ucfirst($table);
$id = $_GET['id']
?>

<h2>更換圖片</h2>
<hr>
<form action="./api/update_img.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td><input type="file" name="img" id=""></td>
        </tr>
        <tr>
            <td><input type='submit' value='變更'></td>
            <td><input type='reset' value='重置'></td>
            <input type='hidden' name='table' value="<?=$table;?>">
            <input type='hidden' name='id' value="<?=$id;?>">

        </tr>
    </table>

       
</form>
<?php
// $$db->add_form();
