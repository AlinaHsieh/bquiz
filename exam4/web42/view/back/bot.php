<?php
if(isset($_POST['bot'])){
$Bottom->save($_POST);
}
?>

<h2>編輯頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp"><input type="text" name="bot" value="<?= $Bottom->find(1)['bot']; ?>"></td>
            <input type="hidden" name="id" value="1">
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
    </div>
</form>