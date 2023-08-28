<?php include_once "DB.php";

class News extends DB
{

    function __construct()
    {
        parent::__construct('news');
    }


    function backend(){
        $data = ['rows'=>$this->paginate(3),
                 'links'=>$this->links(),
                 'start'=>$this->links['start'],
        ];
        $this->view("./view/backend/news.php",$data);

    }
    
}
