<?php 
// include_once "./Controller/DB.php";

session_start();
date_default_timezone_set("Asia/Taipei");

include_once __DIR__ . "/Controller/Viewer.php";
include_once __DIR__ . "/Controller/User.php";
include_once __DIR__ . "/Controller/News.php";
include_once __DIR__ . "/Controller/Que.php";
include_once __DIR__ . "/Controller/Log.php";


function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:$url");
}

$Viewer = new Viewer;
$User = new User;
$News = new News;
$Que = new Que;
$Log = new Log;
