<?php
include_once "../base.php";
//save function 括弧中是陣列>宣告一個空陣列
$table = $_POST['table'];
$db = ucfirst($table);
$data = []; 


//文字欄位
$data['text'] = $_POST['text'];

//預設不顯示
$data['sh'] = 1;

$$db->save($data); //寫入資料表
    // dd($data);   
to("../backend.php?do=$table");


?>