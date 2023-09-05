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
    $rows = $Type->all();
    foreach ($rows as $row) {
    ?>
        <tr>
            <td class="tt"><?=$row['name']?></td>
            <td class="pp">
            <button>修改</button>    
            <button onclick="del('Type',<?=$row['id']?>)">刪除</button>    
            </td>
        </tr>
    <?php
    }
    ?>
</table>


<script>
    function addType(type) {
        let data;
        switch (type) {
            case "big":
                data = {
                    name: $(`#${type}`).val(),
                    big: 0
                };
                break;
            case "mid":
                data = {
                    name: $(`#${type}`).val(),
                    big: $("#bigs").val()
                }
                break;
        }

        $.post("./api/add_type.php", data, () => {
            location.reload();
        })


    }
</script>