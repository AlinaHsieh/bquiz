<?php include_once "DB.php";

class User extends DB{
    function __construct()
    {
        parent::__construct('user');
    }
    
    function login($user){
        $chk = $this->count($user);
        if($chk>0){
            $_SESSION['user']=$_POST['user']['acc'];
            echo 1;
        }
    }
    function back(){
        $view['rows']=$this->all();
        return $this->view("./view/back/user.php",$view);
    }
}