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
        
    </table>
        <input type="button" onclick="login()" value="登入">
        <input type="button" onclick="clean()" value="清除">
        <span style="float: right;">
            <a href="?do=forgot">忘記密碼</a> |
            <a href="?do=reg">尚未註冊</a>
        </span>
</fieldset>
<script>
  function login(){
        let acc=$("#acc").val();
        let pw = $("#pw").val()
    // console.log(user);
    $.post("./api/chk_user.php",{acc,pw},(res)=>{
        switch(parseInt(res)){
            case 1:
                if(acc=='admin'){
                    location.href='./backend.php?do=main';
                }else{
                    location.href='./index.php';
                }
            break;
            case 2:
                alert("密碼錯誤");
            break;
            case 0:
                alert("查無帳號");
            break;
        }
    })
  }

</script>