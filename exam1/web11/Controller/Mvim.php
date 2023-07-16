<?php
include_once "DB.php";

class Mvim extends DB{
    public $header = '動畫圖片管理';
    public $add_header = '新增動畫圖片';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        // $this->table = 'mvim';
        parent::__construct('mvim');
    }

    //Mvim彈跳視窗
    public function add_form(){
    $this->modal("<tr>
                    <td>標題區圖片：</td>
                    <td><input type='file' name='img'></td>
                  </tr>") ;
    }

    //mvim的 back 分頁的內容
    public function list(){
        $this->backend("./view/mvim.php");
    }
}