<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method="post">
        <div>
            <div class="subject">
                <span>問卷名稱</span>
                <input type="text" name="subject" id="subject">
            </div>
            <div class="options">
                <div class="clo">
                    <span>選項</span>
                    <input type="text" name="option[]" id="option">
                    <button type="button" onclick="more()">更多</button>
                </div>
            </div>
        </div>
        <input type="submit" value="新增">|
        <input type="reset" value="清空">
    </form>

</fieldset>
<script>
    function more() {
        let form = `
            <div class="clo">
                <span>選項</span>
                <input type="text" name="option[]" id="option">
            </div>
        `
        $(".options").append(form);
    }
</script>