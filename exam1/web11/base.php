<?php
$BASEDIR = $_SERVER['DOCUMENT_ROOT'];
// echo $BASEDIR;
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Ad.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Admin.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Bottom.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Image.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Menu.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Mvim.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/News.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Title.php";
include_once $BASEDIR . "/bquiz/exam1/web11/Controller/Total.php";

function dd($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

function to($url){
    header("location:" . $url);
}

function q($sql){
    $pdo=new PDO("mysql:host=localhost;charset=utf8;dbname=db11",'root','');
    return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
}
// $total = new DB('total');
// dd($total->find(1));
// echo $total->sum('id');

$Total = new Total;
$Bottom = new Bottom;
$Title = new Title;
$Ad = new Ad;
$Image = new Image;
$Mvim = new Mvim;
$News = new News;
$Admin = new Admin;
$Menu = new Menu;

// $Total = new DB("total");
// $Bottom = new DB("bottom");
// $Title = new DB("title");
// $Ad = new DB("ad");
// $Image = new DB("image");