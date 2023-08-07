<?php include_once "../base.php";
// dd($_GET);
$table = $_GET['table'];
$id = $_GET['id'];
$db = ucfirst($table);
?>
<h2>更新</h2>
<hr>
<form action="../api/update_img.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>
                <input type="file" name="img">
            </td>
            <td>
                <input type="hidden" name="table" value =<?=$table?> >
                <input type="hidden" name="id" value = <?=$id?>>
                <input type="submit" value="更新">
                <input type="reset" value="重置">
            </td>
        </tr>
    </table>
</form>
