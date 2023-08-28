<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width="250px">標題</td>
            <td width="450px">內容</td>
        </tr>
        <?php
        $rows = $News->paginate(5, ['sh' => 1]);
        foreach ($rows as $row) {

        ?>
            <tr>
                <td class="clo title">
                    <?= $row['title']; ?>
                </td>
                <td class="content">
                    <div class="short">
                        <?= mb_substr($row['text'], 0, 25); ?>...
                    </div>
                    <div class="all">
                        <?= $row['text']; ?>
                    </div>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><?= $News->links() ?></div>
</fieldset>
<script>
    $(".title,.content").hover(
        function() {
            $(this).parent().find(".all").show()
        },
        function(){
            $(this).parent().find(".all").hide()
        }
    )

</script>