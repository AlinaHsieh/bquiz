<?php include_once "DB.php";

class User extends DB{

    function __construct()
    {
        parent::__construct('user');
    }

    function chk_acc($user){
        $chk = $this->count(['acc'=>$user['acc']]);
        if($chk>0){
            $chk = $this->chk_pw($user);
            if($chk>0){
                $_SESSION['user'] = $user['acc'];
                return 1; //帳密正確
            }else{
                return 2; //密碼錯誤
            }
        }else{
            return 0; //查無帳號
        }
    }

    function chk_pw($user){
        return $this->count($user);

    }
}