<?php
include_once "./base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
        <script src="./js/js.js"></script>
        <script src="./js/jquery-3.4.1.min.js"></script>
</head>

<body>
        <div id="main">
                <div id="top">
                        <a href="index.php">
                                <img src="./icon/0416.jpg" style="width:45%">
                        </a>

                        <div style="padding:10px;display:inline-block;">
                                <a href="index.php">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?php
                                if(isset($_SESSION['user'])){
                                   echo "<a href='./api/logout.php?do=user'>登出</a> |"  ;
                                }else{
                                   echo "<a href='?do=login'>會員登入</a> |"  ;   
                                }
                                if(isset($_SESSION['admin'])){
                                    echo "<a href='./backend.php'> 返回管理</a>";
                                }else{
                                    echo "<a href='?do=admin_login'> 管理登入</a>";
                                }

                                ?>
                                
                        </div>
                </div>
                <marquee>
                        情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~
                        &nbsp; 年終特賣會開跑了 &nbsp; 即日期至年底，凡會員購物滿仟送佰，買越多送越多~
                </marquee>

                <div id="left" class="ct">
                        <div style="min-height:400px;">
                        <div class="ww"><a href="?type=0">全部商品(<?=$Goods->count();?>)</a></div>
                        <?php
                        $bigs = $Type->all(['big'=>0]);
                        foreach($bigs as $big){
                        ?>
                        <div class="ww">
                                <a href="?type=<?=$big['id']?>"><?=$big['name']?>(<?=$Goods->count(['big'=>$big['id']])?>)</a>
                                <?php
                                if($Type->count(['big'=>$big['id']])>0){
                                        $mids = $Type->all(['big'=>$big['id']]);
                                        foreach($mids as $mid){
                                                ?>
                                                <div class="s">
                                                        <a href="?type=<?=$mid['id']?>"><?=$mid['name']?>(<?=$Goods->count(['mid'=>$mid['id']])?>)</a>
                                                </div>
                                                <?php
                                        }
                                }
                                ?>
                        </div>
                        <?php
                        }

                        ?>
                        </div>
                        <span>
                                <div>進站總人數</div>
                                <div style="color:#f00; font-size:28px;">
                                        00005 </div>
                        </span>
                </div>
                <div id="right">
                <?php
                        $do = $_GET['do']??'main';
                        $file = "./view/front/{$do}.php";
                        $table = ucfirst($do);

                        if(isset($$table)){
                                $$table->front();
                        }elseif(file_exists($file)){
                                include($file);
                        }else{
                                include "./view/front/main.php";
                        }
                ?>

                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
                        <?=$Bottom->bot();?> </div>
        </div>

</body>

</html>