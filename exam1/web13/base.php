<?php
// session_start();

include_once __DIR__ . "/Controller/Title.php";
include_once __DIR__ . "/Controller/Ad.php";
include_once __DIR__ . "/Controller/Mvim.php";

function to($url){
    header("location:" . $url);
}

$Title = new Title;
$Ad = new Ad;
$Mvim = new Mvim;