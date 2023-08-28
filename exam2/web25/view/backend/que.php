<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/que.php" method="post">
        <table id="">
            <div class="title">
                <div style="display: flex;">
                    <div>問卷名稱</div>
                    <div><input type="text" name="subject" id="subject"></div>
                </div>
            </div>
            <div class="content">
                <div style="display: flex;">
                    <div class="options">
                        <span>選項</span>
                        <input type="text" name="opt[]" id="opt">
                        <button type="button" onclick="more()">更多</button>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <input type="submit" value="新增">
                    <input type="reset" value="清空">
                </div>
            </div>
        </table>
    </form>
</fieldset>
<script>
    function more() {

        let input = `
                <div>選項</div>
                <div><input type="text" name="opt[]" id="opt"></div>
        `
        $(".options").append(input)
    }
</script>