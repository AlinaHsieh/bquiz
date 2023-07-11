
   <form action="./api/add.php" method="post">
   <input type="hidden" name="table" value="ad"> 
   <h3>新增最新消息資料</h3>
    <hr>
    <div>
      <td>
      最新消息資料
      </td>
      <td>
         <textarea name="text" style="width: 400px; height:200px;"></textarea>
      </td>
    <input type="hidden" name="table" value="news">
    </div>
    <input type="submit" value="新增">
    <input type="reset" value="重置">
   </form>