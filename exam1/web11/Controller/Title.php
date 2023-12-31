<?php
include_once "DB.php";

class Title extends DB{

    public $header = '網站標題管理';
    public $add_header = '新增網站標題圖片';
    public $title;
    public $img;

    public function __construct()
    {
        // $this->pdo = new PDO($this->dsn, $this->user, $this->pw);
        // $this->table = 'title';
        parent::__construct('title');
        $this->title = $this->find(['sh'=>1])['text'];
        $this->img = $this->find(['sh'=>1])['img'];

    }

    //title彈出視窗的分頁內容
    public function add_form(){
    $form = "<tr>
             <td>標題區圖片：</td>
             <td><input type='file' name='img'></td>
             </tr>
             <tr>
             <td>標題區替代文字：</td>
             <td><input type='text' name='text'></td>
             </tr>";
        $this->modal($form,"./api/add.php");
    }

    //  更新圖片按鈕的彈出視窗
    public function update_img($id){
        $form = "<tr>
                 <td>標題區圖片：</td>
                 <td><input type='file' name='img'></td>
                 </tr>
                 <input type='hidden' name='id' value='$id'>
                 ";
            $this->modal($form,"./api/update_img.php");
        }

    //title的 back 分頁的內容
    // public function list(){
    //     $this->view("./view/title.php");
    // }
    public function list(){
        $data=[
            'rows' => $this->all(),
            'header'=>'網站標題管理',
            'table'=>$this->table,
            'addButton'=>'新增網站標題圖片'

        ];
        $this->view("./view/title.php",$data); //帶第二個參數(陣列)
        //$this->view會在DB的view()產生$path,$arg陣列內容,
    }

    //顯示網頁標題圖片
    public function show(){
        $row=$this->find(['sh'=>1]);
        return ['title'=>$row['text'],'img'=>$row['img']];
        //只return 一個陣列(包含兩個資料:title跟img)
    }
}
