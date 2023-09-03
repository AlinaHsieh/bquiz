<?php
if (isset($_SESSION['user'])) {
    $user = $User->find(['acc' => $_SESSION['user']]);
}
?>
<table class="all">
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <?= $user['acc'] ?>
        </td>
    </tr>
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp"><input type="text" name="name" id="name" value="<?= $user['name'] ?>"></td>
    </tr>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email" value="<?= $user['email'] ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡地址</td>
        <td class="pp"><input type="text" name="address" id="address" value="<?= $user['address'] ?>"></td>
    </tr>
    <tr>
        <td class="tt ct">聯絡電話</td>
        <td class="pp"><input type="text" name="tel" id="tel" value="<?= $user['tel'] ?>"></td>
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
    $sum =0;
    foreach($_SESSION['cart'] as $id =>$qt){
        $row =$Goods->find($id);
    ?>
    <tr class="pp ct">
        <td><?= $row['name']; ?></td>
        <td><?= $row['no']; ?></td>
        <td><?= $qt ?></td>
        <td><?= $row['price']; ?></td>
        <td><?= $row['price'] * $qt; ?></td>
    </tr>
    <?php
    $sum=$sum+($row['price'] * $qt);
    }
    ?>
</table>
<div class="all tt ct">總價：<?=$sum?></div>
<div class="all  ct">
    <input type="hidden" name="sum" id="sum" value="<?=$sum?>">
    <input type="button" value="確定送出" onclick="checkout()">
    <input type="button" value="返回修改訂單" onclick="location.href='?do=buycart'">
</div>

<script>
    function checkout(){
        let user={
                name:$("#name").val(),
                tel:$("#tel").val(),
                address:$("#address").val(),
                email:$("#email").val(),
                total:$("#sum").val()
        }
        $.post("./api/checkout.php",user,()=>{
            alert("訂購完成，感謝您的選購！")
            location.href='index.php';
        })



    }
</script>