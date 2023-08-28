<fieldset>
    <legend>會員註冊</legend>
    <p>＊請設定您要註冊的帳號及密碼(最長12個字元)</p>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td><input type="text" name="acc" id="acc"></td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td><input type="password" name="pw" id="pw"></td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td><input type="password" name="pw2" id="pw2"></td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td><input type="text" name="email" id="email"></td>
        </tr>
        <tr>
            <td>
                <button type="button" onclick="reg()">註冊</button>
                <button type="button" onclick="clean()">清除</button>
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
        // console.log(user);
        if (user.acc == "" || user.pw == "" || user.pw2 == "" || user.email == "") {
            window.alert("不可空白");
        } else if (user.pw !== user.pw2) {
            window.alert("密碼錯誤");
        } else {
            $.post("./api/chk_acc.php", {user}, (res) => {
                if (parseInt(res)> 0) {
                    window.alert("帳號重複");
                } else{
                    $.post("./api/reg.php", user, (res) => {

                    })
                    window.alert("註冊完成，歡迎加入");
                    location.href='./index.php?do=main';
                }
            })
        }

    }
</script>