<?php
include_once "DB.php";

class Admin extends DB{
    public $header = "管理者帳號管理";
    public $add_header = "新增管理者帳號";

    function __construct()
    {
        parent::__construct('admin');
    }
}