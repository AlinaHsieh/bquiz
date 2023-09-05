<?php
$id = $_GET['id'];
$row = $User->find($id);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="./api/save_user.php" method="post">
<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><?=$row['acc']?></td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><?=$row['pw']?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" value="<?=$row['name']?>"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" value="<?=$row['email']?>"></td>
    </tr>
    <tr>
        <td class="tt">地址</td>
        <td class="pp"><input type="text" name="addr" value="<?=$row['addr']?>"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" value="<?=$row['tel']?>"></td>
    </tr>
</table>
<div class="ct">
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" value="修改">
    <input type="reset" value="重置">
</div>
</form>