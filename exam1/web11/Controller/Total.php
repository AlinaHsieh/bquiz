<?php
include_once "DB.php";

class Total extends DB{
    public $header = '進站人數管理';
    public function __construct()
    {
        parent::__construct('total');
    }

function show(){
return $this->find(1)['total'];
}  

function list(){
    return $this->view("./view/total.php");
}

function online(){
    if(!isset($_SESSION['online'])){
        $total = $this->find(1);
        $total['total']++;
        $this->save($total);
        $_SESSION['online']=1;
    }
}


}
