
   <form action="./api/add.php" method="post" enctype="multipart/form-data">
   <input type="hidden" name="table" value="admin"> 
   
   <h3>新增管理者帳號</h3>
    <hr>
    <div>
        <td>帳號：</td>
        <td><input type="text" name="acc"></td>
    </div>
    <div>
        <td>密碼：</td>
        <td><input type="password" name="pw"></td>
        
    </div>
    <div>
        確認密碼：<input type="password" name="pw2">
    </div>
    <input type="submit" value="新增">
    <input type="reset" value="重置">



   </form>

