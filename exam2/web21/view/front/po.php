<div>
    目前位置：首頁 > 分類網誌 > <span id='header'>健康新知</span>
</div>
<div style="display:flex">
    <fieldset style="width:150px;">
        <legend>分類網誌</legend>
        <div><a class='cat' data-type='1' href="#">健康新知</a></div>
        <div><a class='cat' data-type='2' href="#">菸害防治</a></div>
        <div><a class='cat' data-type='3' href="#">癌症防治</a></div>
        <div><a class='cat' data-type='4' href="#">慢性病防治</a></div>
    </fieldset>
    <fieldset style="width:550px;">
        <legend>文章列表</legend>
        <div id="lists"></div>
        <div id="post"></div>
    </fieldset>
</div>

<script>
getList(1) //讓程式先執行一次type為1的

$(".cat").click(function(){
    $("#header").text($(this).text())
    let type = $(this).data('type') //得到data-type藏的值1/2/3/4
    getList(type); //呼叫 getList 函式，並將 type 作為參數傳遞 getList(1) or 2 / 3/ 4
    
})

function getList(type){
    $.get("./api/get_list.php",{type},(list)=>{ //用$_GET 帶type參數傳到 ./api/get_list.php 並在回呼函式得到參數 list
        $("#post").html("")
        $("#lists").html(list);  //當回應返回時，它會將回應的內容填充到具有 id="lists" 的元素中，從而顯示文章列表。
    })
}
function getPost(id){ //拿到id值
    $.get("./api/get_post.php",{id},(post)=>{
        $("#lists").html("");
        $("#post").html(post);
    })

}

</script>