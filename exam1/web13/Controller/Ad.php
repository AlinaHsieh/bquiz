<?php
include_once "DB.php";

class Ad extends DB{
    
    public $header = "動態文字廣告管理";
    public $add_header = "新增動態文字廣告";

    public function __construct()
    {
        parent::__construct('ad');
    }


}