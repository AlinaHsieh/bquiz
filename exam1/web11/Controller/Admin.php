<?php
include_once "DB.php";

class Admin extends DB{
    public $header = '管理者帳號管理';
    public $add_header = '新增管理者帳號';
    public function __construct()
    {
        parent::__construct('admin');
    }

    //admin彈跳視窗
    public function add_form(){
    $this->modal("<tr>
                    <td>帳號：</td>
                    <td><input type='text' name='acc'></td>
                </tr>
                    <tr>
                    <td>密碼：</td>
                    <td><input type='password' name='pw'></td>
                </tr>
                <tr>
                    <td>確認密碼：</td>
                    <td><input type='password'></td>
                </tr>","./api/add.php");    
    }

    //admin的 back 分頁的內容
    public function list(){
        $this->view("./view/admin.php");
    }

    function login($user){
        if(!empty($user)){
            $chk = $this->count(['acc'=>$user['acc'],
                                 'pw'=>$user['pw']]);
            if($chk>0){
                session_start();
                $_SESSION['login'] = $user['acc'];
                to('backend.php');
            }else{
                ?>
                <script>
                    alert("帳號或密碼輸入錯誤");
                </script>
                <?php
            }
        }
    }
}