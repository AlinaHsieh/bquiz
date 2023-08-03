<?php include_once "DB.php";

class Admin extends DB
{
    public $header = "管理者帳號管理";
    public $add_header = "新增管理者帳號";

    function __construct()
    {
        parent::__construct('admin');
    }

    function list()
    {
        $this->view("./view/admin.php");
    }

    function add_form()
    {
        $form = "<tr>
            <td>帳號：</td>
            <td><input type='text' name='acc'></td>
         </tr>
         <tr>
            <td>密碼：</td>
            <td><input type='password' name='pw'></td>
         </tr>
         <tr>
            <td>確認密碼：</td>
            <td><input type='password' name='pw2'></td>
         </tr>";
        return $form;
    }

    function login($user)
    {
        if (!empty($user)) {
            $chk = $this->count([
                'acc' => $user['acc'],
                'pw' => $user['pw']
            ]);
            if ($chk > 0) {
                to("./backend.php");
            }else{
             ?>
             <script>
                window.alert("帳號或密碼錯誤");
             </script>
             <?php   
            }
        }
    }
}
