<?php include_once "./base.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>┌精品電子商務網站」</title>
        <link href="./css/css.css" rel="stylesheet" type="text/css">
        <script src="./js/jquery-3.4.1.min.js"></script>
        <script src="./js/js.js"></script>
        
</head>

<body>
        <div id="main">
                <div id="top">
                        <a href="index.php">
                                <img style="width: 45%;" src="./icon/0416.jpg">
                        </a>
                        <div style="padding:10px;display:inline-block;">
                                <a href="?">回首頁</a> |
                                <a href="?do=news">最新消息</a> |
                                <a href="?do=look">購物流程</a> |
                                <a href="?do=buycart">購物車</a> |
                                <?php
                                if(isset($_SESSION['user'])){
                                        echo "<a href='./api/logout.php?do=user'>登出</a> |";
                                }else{
                                        echo "<a href='?do=login'>會員登入</a> |";
                                }
                                
                                if(isset($_SESSION['admin'])){
                                        echo "<a href='./backend.php'>返回管理</a>";
                                }else{
                                        echo "<a href='?do=admin_login'> 管理登入</a>";
                                }
                                ?>
                        </div>
                        <marquee>情人節特惠活動 &nbsp; 為了慶祝七夕情人節，將舉辦情人兩人到現場有七七折之特惠活動~</marquee>
                </div>
                <div id="left" class="ct">
                        <div style="min-height:400px;">
                                <a href="?type=0">全部商品(<?=$Goods->count(['sh'=>1]);?>)</a>
                                <?php
                                $bigs = $Type->all(['big'=>0]);
                                foreach($bigs as $big){
                                        echo "<div class='ww'>";
                                        echo "<a href='?type={$big['id']}'>{$big['name']}({$Goods->count(['big'=>$big['id'],'sh'=>1])})</a>";
                                        
                                        if($Type->count(['big'=>$big['id']])>0){
                                                $mids = $Type->all(['big'=>$big['id']]);
                                                
                                                echo "<div class='s'>";
                                                foreach($mids as $mid){
                                                        echo "<a href='?type={$mid['id']}'>{$mid['name']}({$Goods->count(['mid'=>$mid['id'],'sh'=>1])})</a>";
                                                }
                                                echo "</div>";
                                                
                                        echo "</div>";
                                        }
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
                $table = ucfirst($do);
                $file = "./view/front/{$do}.php";

                if(isset($$table)){
                        $$table->front();
                }else if(file_exists($file)){
                        include($file);
                }else{
                        include "./view/front/{$do}.php";
                }
                ?>

                </div>
                <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
		        <?=$Bottom->bot();?>
                </div>
        </div>

</body>

</html>