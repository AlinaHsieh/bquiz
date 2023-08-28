<div>目前位置：首頁 > 分類網誌 > <span class="title">慢性病防治</span></div>
<div style="display: flex; width:100%">
    <div>
        <fieldset style="width:200px">
            <legend>分類網誌</legend>
            <div class="tab" data-type="1">健康新知</div>
            <div class="tab" data-type="2">菸害防制</div>
            <div class="tab" data-type="3">癌症防治</div>
            <div class="tab" data-type="4">慢性病防治</div>
        </fieldset>
    </div>
    <div>
        <fieldset style="width:450px">
            <legend>文章列表</legend>
            <div class="post"></div>
        </fieldset>

    </div>
</div>
<script>
    

    $(".tab").click(function(){
        let data = $(this).data('type');
        $(".title").text($(this).text());
        $.get("./api/get_tab.php",{data},(res)=>{
            $(".post").html(res)         
        })
        
    })

    function getPost(id){
        $.get("./api/getPost.php",{id},(res)=>{
            $(".post").html(res)
        })
    }
</script>