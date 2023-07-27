<h2>新增動畫圖片</h2>
<hr>
<form action="./api/add_form.php" method="post" enctype="multipart/form-data">
<table>
    <tr>
        <td>動畫圖片</td>
        <td><input type="file" name="img"></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="mvim">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>

    </tr>
   
</table>
</form>