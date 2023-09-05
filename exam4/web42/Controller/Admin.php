<?php include_once "DB.php";

class Admin extends DB{
    function __construct()
    {
        parent::__construct('admin');
    }
    
    function login($user){
        $chk = $this->count($user);
        if($chk>0){
            $_SESSION['admin']=$_POST['user']['acc'];
            echo 1;
        }
    }


    function back(){
        $view['rows']=$this->all();
        return $this->view("./view/back/admin.php",$view);
    }

    
}