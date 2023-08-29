<?php include_once "DB.php";

class Logs extends DB{

    function __construct()
    {
        parent:: __construct('logs');
    }

    function showGoods($news){
        $chk = $this->count(['user'=>$_SESSION['user'],'news'=>$news]);
        if($chk>0){
            return "<a href='#' class='goods' data-id='$news'>收回讚</a>";
        }else{
            return "<a href='#' class='goods' data-id='$news'>讚</a>";
        }
    }

}