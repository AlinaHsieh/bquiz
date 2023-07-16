<?php
include_once "DB.php";

class Image extends DB{
    public $header = '校園映像資料管理';
    public $add_header = '新增校園映像圖片';
    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user , $this->pw);
        // $this->table = 'image';
        parent::__construct('image');
    }
    //image彈出視窗的內容
    public function add_form(){
    $this->modal("<tr>
                    <td>校園映像資料圖片：</td>
                    <td><input type='file' name='img'></td>
                    </tr>");
    
    }
    //image的 back 分頁的內容
    public function list(){
        $this->backend("./view/image.php");
    }
}