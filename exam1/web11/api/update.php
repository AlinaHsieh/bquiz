<?php
include_once "../base.php";
// dd($_POST);
$table = $_POST['table'];
$db = ucfirst($table);

if(isset($_POST['text'])){
    $rows = $_POST['text'];
}else if($table == 'admin'){
    $rows = $_POST['acc'];
}else{
    $rows =array_column($$db->all(),'img','id');
}

foreach($rows as $id => $text){
    // dd($text);
    if(!empty($_POST['del']) && in_array($id,$_POST['del'])){
        $$db->del($id);
    }else{  
        $row = $$db->find($id);
        switch($table){
            case "title" :
                $row['text']=$text;  //更新text欄位的內容
                $row['sh']=($_POST['sh']==$id)?1:0;  //title的sh只顯示一個，獨立出來寫這裡
            break;
            case "admin" :
                $row['acc'] = $text;
                $row['pw'] = $_POST['pw'][$id];
                dd($row);
            break;

            case "menu" :
            break;

            default:
            if(isset($_POST['text'])){ //如果有text欄位
                $row['text']=$text;  //更新text欄位的內容
            }
            $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;

        }
        // $row=$$db->find($id);  //先把資料撈出來
        // $row['text']=$text; //把$_POST['text']的值賦值給 $row的text(資料庫)的欄位
        // if($table == 'title'){
        //     $row['sh']=($_POST['sh']==$id)?1:0; //若$_POST['sh']等於目前$id，表示是要顯示的，若不等於則為不顯示
            
        // }else{
        //     $row['sh']=(!empty($_POST['sh']) && in_array($id,$_POST['sh']))?1:0; //若$_POST['sh']等於目前$id，表示是要顯示的，若不等於則為不顯示

        // }

        $$db->save($row);
    }
}
to("../backend.php?do=$table");
