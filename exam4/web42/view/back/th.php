<h2 class="ct">商品分類</h2>
<div class="ct">
    <label for="">新增大分類</label>
    <input type="text" name="big" id="big">
    <button onclick="addType('big')">新增</button>
</div>
<div class="ct">
    <label for="">新增中分類</label>
    <select name="bigs" id="bigs"></select>
    <input type="text" name="mid" id="mid">
    <button onclick="addType('mid')">新增</button>
</div>
<table class="all">
    <?php
    $bigs = $Type->all(['big'=>0]);
    foreach($bigs as $big){
    ?>
    <tr>
        <td class="tt"><?=$big['name'];?></td>
        <td class="tt ct">
            <button onclick="editType(this,<?=$big['id'];?>)">修改</button>
            <button onclick="del('Type',<?=$big['id'];?>)">刪除</button>
        </td>
        <?php
        if($Type->count(['big'=>$big['id']])>0){
            $mids = $Type->all(['big'=>$big['id']]);
            foreach($mids as $mid){
            ?>
        <tr>
            <td class="pp ct"><?=$mid['name'];?></td>
            <td class="pp ct">
                <button onclick="editType(this,<?=$mid['id'];?>)">修改</button>
                <button onclick="del('Type',<?=$mid['id'];?>)">刪除</button>
            </td>
        </tr>
            <?php
            }
        }
        ?>
    </tr>
    <?php
    }
    ?>
</table>
<script>
    getBigs();

    function addType(type) {
        let data;
        switch (type) {
            case "big":
                data = {
                    name: $(`#${type}`).val(),
                    big: 0
                }
                break;
            case "mid":
                data = {
                    name: $(`#${type}`).val(),
                    big: $("#bigs").val()
                }
                break;
        }
        $.post("./api/save_type.php", data, () => {
            location.reload();
        })
    }

    function getBigs() {
        $.post("./api/bigs.php", (big) => {
            $("#bigs").html(big);
        })
    }

    function editType(dom,id){
        let text = $(dom).parent().prev().text();
        let name = prompt("請輸入您要修改的名稱",text);

        $.post("./api/save_type.php",{name,id},()=>{
            location.reload();
        })
    }
</script>

<h2 class="ct">商品管理</h2>
<div class="ct"><button onclick="location.href='?do=add_goods'">新增商品</button></div>
<table class="all">
    <tr>
        <td class="tt">編號</td>
        <td class="tt">商品名稱</td>
        <td class="tt">庫存量</td>
        <td class="tt">狀態</td>
        <td class="tt">操作</td>
    </tr>
    <?php
    $goods = $Goods->all();
    foreach($goods as $good){
    ?>
    <tr>
        <td class="pp"><?=$good['no']?></td>
        <td class="pp"><?=$good['name']?></td>
        <td class="pp"><?=$good['stock']?></td>
        <td class="pp"><?=($good['sh']==1?'販售中':'已下架');?></td>
        <td class="pp">
            <button onclick="location.href='?do=edit_goods&id=<?=$good['id']?>'">修改</button>
            <button onclick="del('Goods',<?=$good['id']?>)">刪除</button>
            <button onclick="sw(1,<?=$good['id']?>)">上架</button>
            <button onclick="sw(0,<?=$good['id']?>)">下架</button>
        </td>
    </tr>
    <?php
}
    ?>
</table>
<script>
    function sw(sh,id){
        $.post("./api/sw.php",{sh,id},()=>{
            location.reload();
        })
    }
</script>