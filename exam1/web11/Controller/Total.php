<?php
include_once "DB.php";

class Total extends DB{
    public $header = '進站人數管理';
    public function __construct()
    {
        parent::__construct('total');
    }
    public function add_form(){
        ?>
        
        <?php    
        }
}
