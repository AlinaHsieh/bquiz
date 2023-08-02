<?php
include_once "./base.php";
?>
<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">

    <div style="height:32px; display:block;"></div>
    <!--正中央-->
    <?=$News->morenews();?>
    <div class="cent"><?=$News->links();?></div>
   <script>
            $(".ssaa li").hover(
                function() {
                    $("#altt").html("<pre>" + $(this).children(".all").html() + "</pre>")
                    $("#altt").show()
                }
            )
            $(".ssaa li").mouseout(
                function() {
                    $("#altt").hide()
                }
            )
        </script>
    </div>
</div>