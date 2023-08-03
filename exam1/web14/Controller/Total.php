<?php include_once "DB.php";
class Total extends DB{
    public $header = "網站標題管理";
    public $add_header;

    public function __construct()
    {
        parent::__construct('total');

    }

    public function list(){
        $this->view("./view/total.php");
    }

    function online(){
        if(!isset($_SESSION['online'])){
           $total= $this->find(1);
           $total['total']++;
           $this->save($total);
           $_SESSION['online']=1;
        }
    }
}