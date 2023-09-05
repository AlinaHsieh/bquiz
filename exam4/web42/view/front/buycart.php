<?php
if(isset($_SESSION['user'])){

}else{
    to("?do=login");
}