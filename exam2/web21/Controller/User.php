<?php include_once "DB.php";

class User extends DB{

    function __construct()
    {
        parent::__construct('users');
    }

    function chk_acc($user){
        $chk = $this->count(['acc'=>$user['acc']]);
        if($chk>0){
            $chk = $this->chk_pw($user);
            if($chk>0){
                $_SESSION['user'] = $user['acc'];
                return 1; //表示有此帳號&密碼
            }else{
                return 2; //表示有此帳號但密碼錯誤
            }
        }else{
            return 0; //表示無此帳號
        }

    }
    function chk_pw($user){
        return $this->count($user);

    }

    function backend(){
        $data=[
            'rows'=>$this->all() //取得資料帶到目標頁面使用
        ];
        $this->view("./view/backend/user.php",$data);

    }



}