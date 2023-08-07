<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
				<?php include "marquee.php"; ?>
				<div style="height:32px; display:block;"></div>
				<!--正中央-->
				<h2 class="cent">更多最新消息顯示區</h2>
				<hr>
                <?=$News->morenews()?>
                <?=$News->links()?>
				
                <script>
						$(".ssaa li").hover(
							function() {
								$("#alt").html("<pre>" + $(this).children(".all").html() + "</pre>")
								$("#alt").show()
							}
						)
						$(".ssaa li").mouseout(
							function() {
								$("#alt").hide()
							}
						)
					</script>
			</div>