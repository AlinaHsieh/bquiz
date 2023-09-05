<h2>會員註冊</h2>
<table class="all">
    <tr>
        <td class="tt">姓名</td>
        <td class="pp"><input type="text" name="name" id="name"></td>
    </tr>
    <tr>
        <td class="tt">帳號</td>
        <td class="pp"><input type="text" name="acc" id="acc">
            <button onclick="chk_acc()">檢查帳號</button>
        </td>

    </tr>
    <tr>
        <td class="tt">密碼</td>
        <td class="pp"><input type="password" name="pw" id="pw"></td>
    </tr>
    <tr>
        <td class="tt">電話</td>
        <td class="pp"><input type="text" name="tel" id="tel"></td>
    </tr>
    <tr>
        <td class="tt">住址</td>
        <td class="pp"><input type="text" name="addr" id="addr"></td>
    </tr>
    <tr>
        <td class="tt">電子信箱</td>
        <td class="pp"><input type="text" name="email" id="email"></td>
    </tr>
    <input type="hidden" name="regdate" id="regdate" value="<?=date('Y-m-d')?>">

</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button onclick="clean()">重置</button>
</div>

<script>
    function chk_acc() {
        let acc = $("#acc").val();
        $.post("./api/chk_acc.php",{acc},(res) => {
            if(parseInt(res)==1 || $("#acc").val()=='admin'){
                alert("此帳號已被使用");
            }else{
                alert("此帳號可以使用");
            }
        })
    }

    function reg() {
        let user = {};
        user.name = $("#name").val();
        user.acc = $("#acc").val();
        user.pw = $("#pw").val();
        user.tel = $("#tel").val();
        user.addr = $("#addr").val();
        user.email = $("#email").val();
        user.regdate = $("#regdate").val();
        // console.log(user);

        let acc = $("#acc").val();
        $.post("./api/chk_acc.php",{acc},(res) => {
            if(parseInt(res)==1 || $("#acc").val()=='admin'){
                alert("此帳號已被使用");
            }else{
                $.post("./api/reg.php",user,(res)=>{
                    alert("註冊成功");
                    location.href='?do=login';
                })
            }
        })

    }
</script>