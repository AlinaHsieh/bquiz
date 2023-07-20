<style>
    a{
        text-decoration: none;
    }
    a:hover{
        text-decoration:underline;
    }

</style>
<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?= $this->header ?></p>
    <form method="post" action="./api/update.php">
        <table width="100%">
            <tbody>
                <tr class="yel">
                    <td width="68%">校園映像資料圖片</td>
                    <td width="7%">顯示</td>
                    <td width="7%">刪除</td>
                    <td></td>
                </tr>
                <?php
                // $rows = $this->all();
                // $total = $this->count();
                // $div = 3;
                // $pages = ceil($total / $div);
                // $now = $_GET['page'] ?? 1;
                // $start = ($now - 1) * $div;
                // $rows = $this->all(" limit $start,$div"); //取幾筆顯示(limit前面要空格sql語句才會正確)

                //改成物件的分頁功能
                $rows = $this->paginate(3);

                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td>
                            <img src="./upload/<?= $row['img'] ?>" width="120px" height="80px">
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $row['sh'] == 1 ? "checked" : "" ?>>
                        </td>
                        <td>
                            <input type="checkbox" name="del[]" value="<?= $row['id'] ?>">
                            <input type="hidden" name="id[<?= $row['id'] ?>]" value="<?= $row['id'] ?>">
                        </td>
                        <td>
                            <input type="button" onclick="op('#cover','#cvr','./model/update_img.php?table=<?= $this->table ?>&id=<?= $row['id'] ?>')" value="更新圖片">
                        </td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
        <div style="text-align:center">
            <?php
            //改成物件(下方顯示的頁碼)
            $this->links();

            // if(($now-1)>=1){
            // $prev = $now-1;
            // echo "<a href='?do=image&page=$prev'> &lt;</a>";
            // }

            // for($i=1;$i<=$pages;$i++){
            // $fontsize=($i==$now)?"24px":"16px";
            // echo "<a href='?do=image&page=$i' style='font-size:$fontsize'> $i </a>";
            // }

            // if(($now+1)<=$pages){
            //     $next = $now+1;
            //     echo "<a href='?do=image&page=$next'> &gt;</a>";
            // }

            ?>
            
        </div>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="<?= $this->table ?>">
                    <td width="200px"><input type="button" onclick="op('#cover','#cvr','./model/add_form.php?table=<?= $this->table ?>')" value="新增網站標題圖片"></td>
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>
    </form>
</div>