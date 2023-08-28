<?php include_once "DB.php";

class Log extends DB
{

    function __construct()
    {
        parent::__construct('logs');
    }

    function showGoods($id){
        $chk = $this->count(['news'=>$id,'user'=>$_SESSION['user']]);
        if($chk>0){
            echo "<a href='#' class='goods' data-id='{$id}'>收回讚</a>";
        }else{
            echo "<a href='#' class='goods' data-id='{$id}'>讚</a>";
        }
    }
    
    
}
