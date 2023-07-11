
   <form action="./api/add.php" method="post" enctype="multipart/form-data">
   <input type="hidden" name="table" value="title"> 
   
   <h3>新增網站標題圖片</h3>
    <hr>

    <div>
        標題區圖片：<input type="file" name="img">
    </div>
    <div>
        標題區替代文字<input type="text" name="text">
    </div>
    <input type="submit" value="新增">
    <input type="reset" value="重置">



   </form>

