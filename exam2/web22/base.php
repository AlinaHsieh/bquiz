<?php include_once "Controller/DB.php";
date_default_timezone_set("Asia/Taipei");
session_start();


include_once __DIR__  . "/Controller/Viewer.php";
include_once __DIR__  . "/Controller/User.php";

function dd($array){
echo "<pre>";
print_r($array);
echo "</pre>";
}

function to($url,$arg=null){
    header("location: $url");
}

$Viewer = new Viewer;
$User = new User;