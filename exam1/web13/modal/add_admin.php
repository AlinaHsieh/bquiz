<h2>新增管理者帳號</h2>
<hr>
<form action="./api/add_admin.php" method="post" enctype="multipart/form-data">
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
        <td><input type="password" name="pw2"></td>
    </tr>
    <tr>
        <input type="hidden" name="table" value="admin">
        <td><input type="submit" value="新增"></td>
        <td><input type="reset" value="重置"></td>

    </tr>
</table>
</form>