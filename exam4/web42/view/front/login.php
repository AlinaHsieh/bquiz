<h2>第一次購物</h2>
<a href="?do=reg"><img src="./icon/0413.jpg" alt=""></a>
<h2>會員登入</h2>
<table class="all">
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc"></td>
    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(10,99);
            $b = rand(10,99);
            $_SESSION['ans']= $a+$b;
            echo "{$a} + {$b} ="
            ?>
            <input type="number" name="ans" id="ans">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('User')">登入</button>
    <button onclick="clean()">重置</button>
</div>
