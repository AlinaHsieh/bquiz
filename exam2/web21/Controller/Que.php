<?php include_once "DB.php";

class Que extends DB{

    function __construct()
    {
        parent::__construct('que');
    }

    function backend(){
      
        $this->view("./view/backend/que.php");

    }

    function subject($id){
        $subject = $this->find($id);
        $options = $this->all(['subject_id'=>$id]);
        $subject['options'] = $options; //options資料塞入subject陣列的options中
        return $subject;
    }

}