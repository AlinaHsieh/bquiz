<?php include_once "DB.php";

class Admin extends DB{
    public $header = "管理者帳號管理";
    public $add_header = "新增管理者帳號";

    function __construct()
    {
        parent::__construct('admin');
    }

    function add_form(){
        $form = "
        <tr>
            <td>帳號</td>
            <td><input type='text' name='acc'></td>
        </tr>
        <tr>
            <td>密碼</td>
            <td><input type='text' name='pw'></td>
        </tr>
        <tr>
            <td>確認密碼</td>
            <td><input type='text' name='pw2'></td>
        </tr>
        ";

        echo $form;
    }

    function login(){
        if(!empty($_POST['acc']) && $_POST['pw']){
            $chk=$this->count([
                'acc'=>$_POST['acc'],
                'pw'=>$_POST['pw']
            ]);
            if($chk>0){
                $_SESSION['login'] = $_POST['acc'];
                to('../backend.php?do=title');
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