<form action="" method="get" style="margin:50px">
    <div style="margin-bottom:30px">
        <p>请输入你的姓名：</p>
        <input type="text" name="name_input" class="input-bar" />
        <p>请输入你的身高：</p>
        <input type="number" name="height_input" class="input-bar" /><span style="margin-left:4px">厘米</span>
    </div>
    <input type="submit" class="button" value="确定" />
</form>
<?php //测试数据库用
		$name = $_GET['name_input'];
		$height = $_GET['height_input'];

	echo '<div style="margin-left:50px">'.$name.'的身高是：'.$height.'cm</div>';

	$conn = mysqli_connect("localhost",'root','root','test') or die("未成功连接数据库");
	mysqli_query($conn,'set names utf8');
	$result = mysqli_query($conn,"insert into test (height,name) values ($height,'$name');");
?>
