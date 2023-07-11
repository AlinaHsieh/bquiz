<div style="width:99%; height:87%; margin:auto; overflow:auto; border:#666 1px solid;">
	<p class="t cent botli"><?= $Image->header ?></p>
	<form method="post" action="./api/update.php">
		<input type="hidden" name="table" value="image">
		<table width="100%">
			<tbody>
				<tr class="yel">
					<td width="45%">校園映像資料圖片</td>
					<td width="7%">顯示</td>
					<td width="7%">刪除</td>
					<td width="23%"></td>
				</tr>

				<?php
				$rows = $Image->all();
				foreach ($rows as $id => $row) {
				?>
					<tr>
						<td>
							<img src="./upload/<?= $row['img'] ?>" alt="" style='width:100px; height:68px'>
						</td>
						<td>
							<input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=$row['sh']==1?'checked':''?>>
						</td>
						<td>
							<input type="checkbox" name="del[]" value="<?=$row['id']?>">
						</td>
						<td>
							<input type="button" value="更換圖片">
						</td>
					</tr>
				<?php
				}
				?>
			</tbody>
		</table>
		<table style="margin-top:40px; width:70%;">
			<tbody>
				<tr>
					<td width="200px"><input type="button" onclick="op('#cover','#cvr','./model/image.php')" value="新增校園映像圖片"></td>
					<td class="cent"><input type="submit" value="修改確定"><input type="reset" value="重置"></td>
				</tr>
			</tbody>
		</table>

	</form>
</div>