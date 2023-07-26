<?php
include_once "DB.php";

class Image extends DB{
    public $header = "校園映像資料管理";
    public $add_header = "新增校園映像圖片";

    function __construct()
    {
        parent::__construct('image');
    }


}
