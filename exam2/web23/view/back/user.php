<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/user_admin.php" method="post">
    <table class="ct" style="width:50%;margin:auto">
        <tr class="clo">
            <td style="width:20%">帳號</td>
            <td style="width:20%">密碼</td>
            <td style="width:5%">刪除</td>
        </tr>
        <?php
        // dd($rows);
        foreach($rows as $row){
        ?>
        <tr>
            <td><?=$row['acc'];?></td>
            <td><?=str_repeat("*",strlen($row['pw']))?></td>
            <td><input type="checkbox"  name="del[]" value="<?=$row['id'];?>" id="del"></td>
        </tr>
        <?php
        }
        ?>
    </table>
    <div>
        <input type="submit" value="確定刪除">
        <button type="button" onclick="cleanAll()">清空選取</button>
    </div>
    </form>

<h2>新增會員</h2>
<table>
        <span style="color:red;">請設定您要註冊的帳號及密碼(最長12個字元)</span>
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
                <button type="button" onclick="reg()">新增</button>
                <button type="button" onclick="clean()">清除</button>
            </td>
            <td></td>
        </tr>
    </table>


</fieldset>
<script>
    function cleanAll(){
       
        $("input[type='checkbox']").attr("checked", false);
    }

    function reg(){
    let info = {
            acc:$("#acc").val(),
            pw:$("#pw").val(),
            pw2:$("#pw2").val(),
            email:$("#email").val()
    }
    if(info.acc==""||info.pw==""||info.pw2==""||info.email==""){
        alert("不可為空");
    }else if(info.pw!==info.pw2){
        alert("密碼錯誤");
    }else{
        $.post("./api/chk_acc.php",{acc:info.acc},(res)=>{
            if(parseInt(res)!==0){
                alert("帳號重複");
            }else{
                $.post("./api/reg.php",info,()=>{
                    location.reload();
                })
            }
        })
    }
}
</script>