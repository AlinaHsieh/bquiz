<?php include_once "DB.php";

class Total extends DB{
    public $header = "進站總人數管理";

    public function __construct()
    {
        parent::__construct('total');
    }

    public function list(){
        $this->view("./view/total.php");

    }

    function total(){
        if(!isset($_SESSION['online'])){
            $row = $this->find(1);
            $row['total']++;
            $this->save($row);
            $_SESSION['online']=1;
        }
    }
}