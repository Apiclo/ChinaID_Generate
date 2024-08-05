<form action="" method="get" style="margin:50px">
    <div style="margin-bottom:30px">
        <span>你的昵称：</span><br>
        <input type="text" name="name_input" class="input-bar" />
        <br><br><br>
        <span>你的身高：</span><span style="margin-left:4px">厘米/CM</span><br>
        <input type="number" name="height_input" class="input-bar" />
        <br><br><br>
        <span>你的体重：</span><span style="margin-left:4px">公斤/KG</span><br>
        <input type="number" name="weight_input" class="input-bar" />
        <br><br><br>
        <span>你的鞋码：</span><span style="margin-left:4px">欧标/EUR</span><br>
        <input type="number" name="feet_input" class="input-bar" />
    </div>
    <input type="submit" class="button" value="确定" />

    <a style="text-align:center;">
        <div class="button">History</div>
    </a>
</form>
<?php //测试数据库用
		$name = $_GET['name_input'];
		$height = $_GET['height_input'];

	echo '<div style="margin-left:50px">'.$name.'的身高是：'.$height.'cm</div>';
	

	$conn = mysqli_connect("localhost",'ids','0933','ids') or die("未成功连接数据库");
	mysqli_query($conn,'set names utf8');
	$result = mysqli_query($conn,"insert into heights (height,name) values ($height,'$name');");
?>
