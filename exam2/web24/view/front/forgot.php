<div>請輸入信箱以查詢密碼</div>
<div><input type="text" name="email" id="email"></div>
<div id="res"></div>
<button type="button" onclick="find()">尋找</button>

<script>
    function find() {
        let email = $("#email").val();
        // console.log(input);
        $.post("./api/get_email.php",{email},(res)=>{
            $("#res").text(res);
        })
    }
</script>