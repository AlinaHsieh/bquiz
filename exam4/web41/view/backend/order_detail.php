<?php
$row = $Order->find(['no' => $_GET['no']]);
$cart = unserialize($row['cart']);
?>
<h2 class="ct">訂單編號<span><?= $_GET['no'] ?>的詳細資料</span></h2>
<table class="all">
    <tr>
        <td class="tt">會員帳號</td>
        <td class="pp"><?= $row['acc'] ?></td>
    </tr>
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><?= $row['name'] ?></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><?= $row['email'] ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡地址</td>
        <td class="pp"><?= $row['address'] ?></td>
    </tr>
    <tr>
        <td class="tt">聯絡電話</td>
        <td class="pp"><?= $row['tel'] ?></td>
    </tr>
</table>
<table class="all">
    <tr class="tt ct">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>
        <td>單價</td>
        <td>小計</td>
    </tr>
    <?php
    foreach ($cart as $id => $val) {
        $item = $Goods->find($id);
    ?>
        <tr class="pp ct">
            <td><?=$item['name'] ?></td>
            <td><?=$item['no'] ?></td>
            <td><?=$val?></td>
            <td><?=$item['price'] ?></td>
            <td><?=$item['price']*$val ?></td>
        </tr>
    <?php
    }
    ?>
</table>
    <div class="tt ct all">
        <div>總價：<?=$row['total'] ?></div>
    </div>
    <div class="ct">
        <button onclick="location.href='?do=order'">返回</button>
    </div>