<?php
include_once __DIR__ . "/Controller/Title.php";
include_once __DIR__ . "/Controller/Ad.php";
include_once __DIR__ . "/Controller/Mvim.php";
include_once __DIR__ . "/Controller/Image.php";
include_once __DIR__ . "/Controller/Total.php";
include_once __DIR__ . "/Controller/Bottom.php";
include_once __DIR__ . "/Controller/News.php";
include_once __DIR__ . "/Controller/Admin.php";
include_once __DIR__ . "/Controller/Menu.php";

function to($url){
    header("location:" . $url);
}

function dd($array){
echo "<pre>";
print_r($array);
echo "</pre>";
}

$Title = new Title;
$Ad = new Ad;
$Mvim = new Mvim;
$Image = new Image;
$Total = new Total;
$Bottom = new Bottom;
$News = new News;
$Admin = new Admin;
$Menu = new Menu;