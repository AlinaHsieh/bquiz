<div>
    目前位置：首頁 > 分類網誌 > <span class="title">健康新知</span>
</div>
<div style="display: flex;">
    <fieldset style="width: 150px;">
        <legend>分類網誌</legend>
        <div class="list" data-type="1">健康新知</div>
        <div class="list" data-type="2">菸害防制</div>
        <div class="list" data-type="3">癌症防治</div>
        <div class="list" data-type="4">慢性病防治</div>
    </fieldset>
    <fieldset style="width: 600px;">
        <legend>文章列表</legend>
        <div class="post"></div>
        <div class="text"></div>
    </fieldset>
</div>
<script>
    getList(1)
    $(".list").click(function(){
        let type = $(this).data("type")
        // console.log(type);
        $(".text").html("")
        $(".title").text($(this).text());
        getList(type)
    })
function getList(type){
    $.get("./api/getList.php",{type},(res)=>{
            $(".post").html(res);
        })
}

function getPost(id){
$.get("./api/getPost.php",{id},(res)=>{
    $(".post").html("");
    $(".text").html(res);
})
}
</script>