<div>
    <span>請輸入信箱以查詢密碼</span>
    <p><input type="text" name="email" id="email"></p>
    <button type="button" onclick="find()">尋找</button>
    <div class="res"></div>
</div>
<script>
function find(){
    let email = $("#email").val();
    $.post("./api/find_pw.php",{email},(res)=>{
        $(".res").html(res);
    })
}
</script>
