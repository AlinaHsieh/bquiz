<?php
if(isset($_POST['bottom'])){
    $Bottom->save($_POST);
}
?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="?do=bot" method="post">
    <table class="all">
        <tr>
            <td class="tt">頁尾宣告內容</td>
            <td class="pp" style=""><input type="text" name="bottom" value="<?=$Bottom->bot();?>"></td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="hidden" name="id" value="1">
    </div>
</form>