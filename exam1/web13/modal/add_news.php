<h2>新增最新消息</h2>
<hr>
<form action="./api/add_form.php" method="post" enctype="multipart/form-data">
<table>
    
    <tr>
        <td>最新消息文字</td>
        <td><textarea name="text" width="150px" height="80px"></textarea></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="news">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>

    </tr>
</table>
</form>