<?php include_once "DB.php";

class Total extends DB{
    public $header = "進站總人數管理";
    public $add_header = "";

    function __construct()
    {
        parent::__construct('total');
    }


    function total(){
        if(!isset($_SESSION['online'])){
            $row = $this->find(1);
            $row['total']++;
            $_SESSION['online']=1;
            $this->save($row);
        }
    } 
}