<?php
$type = $_GET['type']??0;
?>
<h2><?=$Type->nav($type)?></h2>
<?php
if($type==0){
    $goods = $Goods->all();
}else{
    $rows = $Type->find($_GET['type']);
    if($rows['big']==0){ //代表大分類 $Good撈大分類id
        $goods = $Goods->all(['big'=>$rows['id']]);
    }else{
        $goods = $Goods->all(['mid'=>$rows['id']]);
    }
}

foreach($goods as $good){
?>
<div style="display: flex">
    <div class="pp" style="width:30%"><a href="?do=intro&id=<?=$good['id'];?>"><img src="<?="./upload/{$good['img']}"?>"  style="width:80%;border:1px solid white"></a></div>
    <div class="tt"  style="width:70%" >
        <div class="tt" style="border:1px solid white">
            <?=$good['name']?>
        </div>
        <div class="pp" style="border:1px solid white">
            價錢：<?=$good['price']?>
            <a href="?do=buycart&id=<?=$good['id'];?>&qt=1"><img src="./icon/0402.jpg" style="float: right;"></a>
        </div>
        <div class="pp" style="border:1px solid white">
            規格：<?=$good['spec']?>
        </div>
        <div class="pp" style="border:1px solid white">
            簡介：<?=mb_substr($good['intro'],0,15)?>...
        </div>
    </div>
</div>
<?php }?>