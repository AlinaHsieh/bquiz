<div>
    目前位置：首頁 > 分類網誌 > <span id="header">健康新知</span>
</div>
<div style="display: flex;">
    <fieldset style="width: 150px;">
        <legend>分類網誌</legend>
        <div>
            <div class="cat" data-type="1">健康新知</div>
            <div class="cat" data-type="2">菸害防制</div>
            <div class="cat" data-type="3">癌症防治</div>
            <div class="cat" data-type="4">慢性病防治</div>
        </div>
    </fieldset>
    <fieldset style="width: 550px;">
        <legend>文章列表</legend>
        <div>
            <div id="list"></div>
            <div id="post"></div>
        </div>
    </fieldset>
</div>
<script>
    $(".cat").click(function(){
        $("#header").text($(this).text());
        let type = $(this).data("type");
        $.get("./api/get_list.php",{type},(list)=>{
            $("#post").html("");
            $("#list").html(list);
        })

    })

    function getPost(id){
        $.get("./api/get_post.php",{id},(post)=>{
            $("#list").html("");
            $("#post").html(post);
        })
    }

</script>