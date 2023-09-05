<?php include_once "DB.php";

class Bottom extends DB{
    function __construct()
    {
        parent::__construct('bottom');
    }
    
    function bot(){
        echo $this->find(1)['bot'];
    }
}