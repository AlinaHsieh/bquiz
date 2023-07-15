<h3>新增管理者帳號</h3>
<hr>
<form action="./api/add.php" method="post" enctype="multipart/form-data">
<table>
   
    <tr>
        <td>帳號：</td>
        <td><input type="text" name="acc"></td>
    </tr>
    <tr>
        <td>密碼：</td>
        <td><input type="password" name="pw"></td>
    </tr>
    <tr>
        <td>確認密碼：</td>
        <td><input type="password"></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="admin">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>
    </tr>
</table>
</form>