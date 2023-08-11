<fieldset>
    <legend>會員登入</legend>
        <table>
            <tr>
                <td>帳號</td>
                <td><input type="text" name="acc" id="acc"></td>
            </tr>
            <tr>
                <td>密碼</td>
                <td><input type="password" name="pw" id="pw"></td>
            </tr>
            <tr>
                <td>
                    <input type="button" value="登入" onclick="login()">
                    <input type="button" value="清除" onclick="clean()">
                </td>
                <td>
                    <a href="?do=forgot">忘記密碼</a>
                    <a href="?do=reg">尚未註冊</a>
                </td>
            </tr>
        </table>
</fieldset>

<script>
    function login(){
        let user={ acc:$("#acc").val(),
                   pw:$("#pw").val()}  //取得輸入的值，然後用AJAS驗證
            // console.log(user)
        $.post('./api/chk_acc.php',user,(res)=>{
            switch(parseInt(res)){  //解析從php拿到的資料，讓資料型態保證為數字型態
            case 0:
                alert("查無帳號");
            break;
            case 1:
                if(user.acc=='admin'){
                    location.href='./backend.php';
                }else{
                    location.href='./index.php';
                }
            break;
            case 2:
                alert("密碼錯誤");
            break;
            }
        })
    }

    // function clean(){
    //     $("#acc,#pw").val("");

    // }
    ////已將function clean()寫在js

</script>