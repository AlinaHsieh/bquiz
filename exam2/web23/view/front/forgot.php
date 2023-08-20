<div>
    <div id="res"></div>
    <span>請輸入信箱以查詢密碼</span>
    <input type="text" name="email" id="email">

</div>
<button type="button" onclick="find()">尋找</button>
<script>
    function find() {
        $.get("./api/find.php",{email:$("#email").val()},(res)=>{
            $("#res").text(res);
        })
    }
</script>