<?php include_once "../base.php";
$table = $_GET['table'];
$db = ucfirst($table);
?>
   <form action="./api/add.php" method="post" enctype="multipart/form-data">
       
       <h3><?=$$db->add_header?></h3>
       <hr>
    <?=$$db->add_form();?>   
       
    <input type="hidden" name="table" value="<?=$table?>"> 
    <input type="submit" value="新增">
    <input type="reset" value="重置">



   </form>

