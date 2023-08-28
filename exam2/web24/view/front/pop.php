<style>
    .all{
        /* display: none; */
        background: rgba(51, 51, 51, 0.8);
        color: #FFF;
        min-height: 100px;
        width: 300px;
        position: fixed;
        display: none;
        z-index: 9999;
        overflow: auto;
        padding: 15px;
        border-radius: 10px;
    }
   
</style>

<fieldset>
    <legend>目前位置：首頁 > 分類網誌 > <span class="title">人氣文章區</span></legend>
    <table>
        <tr>
            <td width="30%">標題</td>
            <td width="65%">內容</td>
        </tr>
        <?php
        $rows = $News->paginate(5);
        foreach ($rows as $row) {
        ?>
            <tr>
                <td class="title clo "><?= $row['title']; ?></td>
                <td class="content">
                    <div class="short"><?= mb_substr($row['text'], 0, 25); ?>...</div>
                    <div class="all" style="display: none;"><?= nl2br($row['text']); ?></div>
                </td>
            </tr>
        <?php }; ?>
    </table>
    <div class="ct"><?= $News->links(); ?></div>
</fieldset>
<script>
    $(".title,.content").hover(
        function(){
            $(this).parent().find(".all").show();
        },
        function(){
            $(this).parent().find(".all").hide();
        }
    )
</script>