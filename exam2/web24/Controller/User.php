<?php include_once "DB.php";

class User extends DB
{

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
                return 1;
            }else{
                return 2;
            }
        }else{
            return 0;
        }
    }

    function chk_pw($user){
        return $this->count($user);
    }

    function findEmail($user){
        $row = $this->find(['email'=>$user['email']]);
        if(!empty($row)){
            return "您的密碼為".$row['pw'];
        }else{
            return "查無此資料";
        }
        
    }

    function backend(){
        $data = ['rows'=>$this->all()];
        $this->view("./view/backend/user.php",$data);

    }
}
