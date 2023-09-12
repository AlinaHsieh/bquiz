<?php
$good = $Goods->find($_GET['id']);
?>
<h2> <?=$good['name']?></h2>
<div style="display: flex">
    <div class="pp" style="width:50%"><a href="?do=intro&id=<?=$good['id'];?>"><img src="<?="./upload/{$good['img']}"?>"  style="width:80%;border:1px solid white"></a></div>
    <div class="tt"  style="width:50%" >
        <div class="tt" style="border:1px solid white">
            <?=$Type->find($good['big'])['name'].">".$Type->find($good['mid'])['name']?>
        </div>
        <div class="pp" style="border:1px solid white">
        編號：<?=$good['no']?>
        </div>
        <div class="pp" style="border:1px solid white">
        價格：<?=$good['price']?>
        </div>
        <div class="pp" style="border:1px solid white">
            詳細說明：<?=$good['intro']?>
        </div>
        <div class="pp" style="border:1px solid white">
            庫存量：<?=$good['stock']?>
        </div>
    </div>
</div>
<div class="ct tt">
    購買數量：
    <input type="number" name="qt" id="qt">
<a href="Javascript:buy(<?=$good['id']?>)"><img src="./icon/0402.jpg"></a>

</div>
<script>
function buy(id){
    qt = $("#qt").val();
    location.href=`?do=buycart&id=${id}&qt=${qt}`;
}
</script>