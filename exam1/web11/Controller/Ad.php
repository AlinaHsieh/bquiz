<?php
include_once "DB.php";
class Ad extends DB{

    public $header = '動態文字廣告管理';
    protected $add_header = '新增動態文字廣告';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        // $this->table = 'ad';
        parent::__construct('ad');
    }

    //ad彈跳視窗
    public function add_form(){
    
    $form="<tr>
                <td>動態文字廣告：</td>
                <td><input type='text' name='text'></td>
           </tr>";
    $this->modal($form); //執行：modal裡面放$form
    }

     //ad的 back 分頁的內容
     public function list(){
        $this->backend("./view/ad.php");
    }
}