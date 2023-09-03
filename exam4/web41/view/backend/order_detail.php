<?php
$row = $Order->find(['no'=>$_GET['no']]);
?>
<h2 class="ct">訂單編號<span><?= $_GET['no'] ?>的詳細資料</span></h2>
<table class="all">
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?=$row['acc'] ?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?=$row['name'] ?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?=$row['email'] ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?=$row['address'] ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡電話</td>
        <td class="pp"><?=$row['tel'] ?></td>
    </tr>
</table>
