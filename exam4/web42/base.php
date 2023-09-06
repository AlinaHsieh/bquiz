<?php

session_start();
date_default_timezone_set("Asia/Taipei");

include_once __DIR__ . "/Controller/Bottom.php";
include_once __DIR__ . "/Controller/Admin.php";
include_once __DIR__ . "/Controller/User.php";
include_once __DIR__ . "/Controller/Type.php";
include_once __DIR__ . "/Controller/Goods.php";

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:$url");
}

$Bottom = new Bottom;
$User = new User;
$Admin = new Admin;
$Type = new Type;
$Goods = new Goods;
