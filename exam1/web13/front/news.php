<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
    <!--正中央-->
   <?=$News->morenews();?>
   <div class="cent">
     <?=$News->links();?>
   </div>

    
    <script>
        
        var lin = new Array();
        var now = 0;
        if (lin.length > 1) {
            setInterval("ww()", 3000);
            // now = 1;
        }

        function ww() {
            $("#mwww").html("<embed loop=true src='" + lin[now] + "' style='width:99%; height:100%;'></embed>")
            //$("#mwww").attr("src",lin[now])
            now++;
            if (now >= lin.length)
                now = 0;
        }
        ww()
    </script>

   
</div>