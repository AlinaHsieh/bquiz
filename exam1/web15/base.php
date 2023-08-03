<?php 
session_start();
include_once __DIR__ . "/Controller/Ad.php";
include_once __DIR__ . "/Controller/Admin.php";
include_once __DIR__ . "/Controller/Bottom.php";
include_once __DIR__ . "/Controller/Image.php";
include_once __DIR__ . "/Controller/Menu.php";
include_once __DIR__ . "/Controller/Mvim.php";
include_once __DIR__ . "/Controller/News.php";
include_once __DIR__ . "/Controller/Title.php";
include_once __DIR__ . "/Controller/Total.php";

function to($url){
    header("location:" . $url);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

$Ad = new Ad;
$Admin = new Admin;
$Bottom = new Bottom;
$Image = new Image;
$Menu = new Menu;
$Mvim = new Mvim;
$News = new News;
$Title = new Title;
$Total = new Total;
$Total->total();