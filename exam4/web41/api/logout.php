<?php include_once "../base.php";

session_start();
switch($_GET['do']){
    case "user":
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
        break;
    case "admin":
        unset($_SESSION['admin']);
        break;
    }
    to("../index.php");
