<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
    <p class="t cent botli"><?=$this->header?></p>
    <form method="post" action="./api/update_bottom.php">
        <table width="100%">
            <tbody>
                <tr class="" width="50%">
                    <td width="50%">頁尾版權資料：</td>
                    <td width="50%"><input type="text" name="bottom" value="<?=$this->find(1)['bottom'];?>"></td>
                </tr>
            </tbody>
        </table>
        <table style="margin-top:40px; width:70%;">
            <tbody>
                <tr>
                    <input type="hidden" name="table" value="bottom">
                    <td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
                </tr>
            </tbody>
        </table>

    </form>
</div>