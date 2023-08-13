<?php include_once "DB.php";

class News extends DB{

    function __construct()
    {
        parent::__construct('news');
    }

    function backend(){
        $data=[
            'rows'=>$this->paginate(3),   //取得資料帶到目標頁面使用
            'links'=>$this->links(),
            'start'=>$this->links['start'],
        ];
        $this->view("./view/backend/news.php",$data);

    }



}