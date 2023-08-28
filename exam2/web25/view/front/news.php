<fieldset>
    <legend>目前位置：首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width="250px">標題</td>
            <td width="450px">內容</td>
            <td></td>
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
                <td id="goods">
                    <?php
                    if(isset($_SESSION['user'])){
                        // echo "<a href='#'>讚</a>";
                       echo $Logs->showGoods($row['id']);
                    }
                    ?>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
    <div class="ct"><?= $News->links() ?></div>
</fieldset>
<script>
    $(".title,.content").click(function() {
        $(this).parent().find(".short,.all").toggle()
    })
    $("#goods").click(function(){
        console.log("OK");
    })
</script>