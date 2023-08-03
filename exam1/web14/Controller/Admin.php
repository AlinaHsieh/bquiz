<?php include_once "DB.php";
class Admin extends DB{
    public $header = "管理者帳號管理";
    public $add_header= "新增管理者帳號";

    public function __construct()
    {
        parent::__construct('admin');

    }

    public function list(){
        $this->view("./view/admin.php");
    }

    function login($user){
        if(!empty($user)){
            $chk=$this->count(['acc'=>$user['acc'],
                                'pw'=>$user['pw']]);
            if($chk>0){
                session_start();
                $_SESSION['login'] = $user['acc'];
                to('backend.php');
            }else{
                ?>
                <script>
                    window.alert("帳號或密碼錯誤")
                </script>
                <?php
            }
        }
    }
}