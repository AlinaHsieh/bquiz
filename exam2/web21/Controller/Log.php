<?php include_once "DB.php";

class Log extends DB{

    function __construct()
    {
        parent::__construct('log');
    }
    
    function showGoods($news){ //帶文章的id值
        $chk = $this->count(['user'=>$_SESSION['user'],'news'=>$news]); //去log資料表核對user是否有按過某篇文章讚
        if($chk>0){
            return "收回讚";
        }else{
            return "讚";
        }
        
    }



}