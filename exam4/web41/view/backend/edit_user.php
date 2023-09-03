<?php
$row = $User->find($_GET['id']);
?>
<h2 class="ct">編輯會員資料</h2>
<form action="./api/edit_user.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
                <?=$row['acc']?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">密碼</td>
            <td class="pp">
                <?=$row['pw']?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp"><input type="text" name="name" id="name" value="<?=$row['name']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電子郵件</td>
            <td class="pp"><input type="text" name="email" id="email" value="<?=$row['email']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">住址</td>
            <td class="pp"><input type="text" name="address" id="address" value="<?=$row['address']?>"></td>
        </tr>
        <tr>
            <td class="tt ct">電話</td>
            <td class="pp"><input type="text" name="tel" id="tel" value="<?=$row['tel']?>"></td>
        </tr>
        <input type="hidden" name="id" value="<?=$row['id']?>">
        
        
    </table>
    <div class="ct">
        <input type="submit" value="編輯">
        <input type="reset" value="重置">
        <input type="reset" value="取消" onclick="location.href='?do=user'">
    </div>
</form>

<script>
  
</script>