<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div style="display: flex;">
            <div>問卷名稱</div>
            <div><input type="text" name="subject" id="subject"></div>
        </div>
        <div class="options">
            <div class="clo">
                <label for="">選項</label>
                <input type="text" name="option[]">
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
            <div class="clo">
                <label for="">選項</label>
                <input type="text" name="option[]">
            </div>`;
        $(".options").append(input);
    }
</script>