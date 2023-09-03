<div class="ct">
<h2>訂單管理</h2>
</div>
<table class="all">
    <tr class="ct">
        <td class="tt">訂單編號</td>
        <td class="tt">金額</td>
        <td class="tt">會員帳號</td>
        <td class="tt">姓名</td>
        <td class="tt">下單時間</td>
        <td class="tt">操作</td>
    </tr>
   <?php
   foreach($rows as $row){
    ?>
     <tr class="ct">
     <td class="pp"><a href="?do=order_detail&no=<?=$row['no']?>"><?=$row['no']?></a></td>
        <td class="pp"><?=$row['total']?></td>
        <td class="pp"><?=$row['acc']?></td>
        <td class="pp"><?=$row['name']?></td>
        <td class="pp"><?=$row['orderdate']?></td>
        <td class="pp">
           <button type="button" onclick="del('Order',<?=$row['id']?>)">刪除</button>
        </td>
    </tr>
    <?php
   }
   ?>
</table>