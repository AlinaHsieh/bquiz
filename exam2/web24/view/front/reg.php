<fieldset>
    <legend>會員註冊</legend>
    <p>*請設定您要註冊的帳號及密碼</p>
    <table>
        <tr>
            <td class="clo">Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td class="clo">Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td class="clo">Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td class="clo">Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="註冊" onclick="reg()">
                <input type="reset" value="清除" onclick="clean()">
            </td>
        </tr>
    </table>
</fieldset>

<script>
    function reg() {
        let user = {
                acc: $("#acc").val(),
                pw: $("#pw").val(),
                pw2: $("#pw2").val(),
                email: $("#email").val()
        }
        console.log(user);
        if (user.acc == "" || user.pw== "" || user.pw2 == "" || user.email == "") {
            alert("不可空白");
        } else if (user.pw!==user.pw2) {
            alert("密碼錯誤");
        } else {
            $.post("./api/chk_user.php", {acc: user.acc}, (res) => {
                if (parseInt(res)!== 0) {
                    alert("帳號重複");
                } else {
                    $.post("./api/reg.php", user, (res) => {
                        alert("註冊成功");
                    })
                }
            })
        }
    }
</script>