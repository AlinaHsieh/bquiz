<?php include_once "DB.php";

class User extends DB{

    function __construct()
    {
        parent:: __construct('user');
    }

    function chk_acc($user){
        $chk = $this->count(['acc'=>$_POST['acc']]);
        if($chk>0){
            $chk = $this->chk_pw($user);
            if($chk>0){
                $_SESSION['user']=$user['acc'];
                echo 1;
            }else{
                echo 2;
            }
        }else{
            echo 0;
        }
    }

    function chk_pw($user){
        return $this->count($user);
        
    }

}