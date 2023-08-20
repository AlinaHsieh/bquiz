<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div>
            <div>
                <label for="">問卷名稱</label>
                <input type="text" name="subject" id="">
            </div>
        </div>
        <div class="options">
            <div class="clo" style="display:flex;">
                <div>選項</div>
                <div><input type="text" name="option[]" id=""></div>
                <button type="button" onclick="more()">更多</button>
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>
</fieldset>
<script>
    function more(){
        let input = `
            <div class="clo" style="display:flex;">
                <div>選項</div>
                <div><input type="text" name="option[]" id=""></div>
            </div>`
        $(".options").append(input);
    }
</script>