
<form action="" method="get" style="margin:50px">
	<div style="margin-bottom:30px">
	    <p>请输入你的身高：</p>
		<input type="number" name="height_input" class="input-bar"/><span style="margin-left:4px">厘米</span>
	</div>
		<input type="submit" class="button" value="确定"/>
</form>
<?php //高科技就完事了
	function height_calc(){
		$height = $_GET['height_input'];
		$height = $height * 100;
		$height = $height / 100;
		return $height;
		}
	?>
<?php 
	echo '<div style="margin-left:50px">你的身高是：'.height_calc().'cm</div>';
?>

