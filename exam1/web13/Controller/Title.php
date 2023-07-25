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
    }

}
