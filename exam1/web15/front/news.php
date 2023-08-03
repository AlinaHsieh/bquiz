<div class="di" style="height:540px; border:#999 1px solid; width:53.2%; margin:2px 0px 0px 0px; float:left; position:relative; left:20px;">
	<h2>更多最新消息顯示區</h2>
	<hr>
<ul class="ssaa" style="list-style-type:decimal;">
		<?= $News->morenews(); ?>
		<div class="cent"><?=$News->links();?></div>
	</ul>
	<div id="altt" style="position: absolute; width: 350px; min-height: 100px; background-color: rgb(255, 255, 204); top: 50px; left: 130px; z-index: 99; display: none; padding: 5px; border: 3px double rgb(255, 153, 0); background-position: initial initial; background-repeat: initial initial;"></div>
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