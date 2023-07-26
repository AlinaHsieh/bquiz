<?php
include_once "DB.php";

class Title extends DB{

    public $header = '網站標題管理';
    public $add_header = '新增網站標題管理';
    public $title;
    public $img;

    public function __construct()
    {
        parent::__construct('title');
        // $this->title = $this->find(['sh'=>1])['text'];
        // $this->img = $this->find(['sh'=>1])['img'];
    }

    public function list(){
        // $data = [
        //     'rows'=>$this->all(),
        //     'header'=>'網站標題管理',
        //     'table'=>$this->table,
        //     'addButton'=>'新增網站標題圖片'
        // ];
        // $this->view("./view/title.php",$data);
        $this->view("./view/title.php");

    }
}
