<?php
include_once "DB.php";

class Bottom extends DB{
    public $header = '頁尾版權管理';
    public function __construct()
    {
        parent::__construct('bottom');
    }
    public function add_form(){
    ?>
    
    <?php    
    }
}