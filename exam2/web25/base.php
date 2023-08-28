<?php 
include __DIR__ . "/Controller/Viewer.php";
include __DIR__ . "/Controller/User.php";
include __DIR__ . "/Controller/News.php";
include __DIR__ . "/Controller/Que.php";
include __DIR__ . "/Controller/Logs.php";

session_start();
date_default_timezone_set("Asia/Taipei");

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
$Logs = new Logs;
