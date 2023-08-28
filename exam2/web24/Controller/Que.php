<?php include_once "DB.php";

class Que extends DB
{

    function __construct()
    {
        parent::__construct('que');
    }


    function backend(){
        $data = ['rows'=>$this->all()];
        $this->view("./view/backend/que.php",$data);

    }
}
