<meta charset="utf-8">
<?php
    error_reporting(0);
    include 'header.php';
    include 'navbar.php';
    include '../ID_Generate/areacode.php';//地区转代码
    $originId = $_POST['originId'];
    $Name = $_POST['areaInput'];//地区代码
    $year = $_POST['yearInput'];//年份
    $month = $_POST['monthInput'];//月份
    $day = $_POST['dayInput'];//日期
    $gender = $_POST['genderInput'];//性别
    $order = rand(0,999);
?>
<?php //if($Name == null){ echo '<script> alert ("地区为必填项")</script>';}?>
<?php //日期矫正
$month=str_pad($month,2,"0",STR_PAD_LEFT);
$day=str_pad($day,2,"0",STR_PAD_LEFT);
if($month == 02 && $day>28){$day = '28';}//二月份  TODO：目前还没搞闰年识别，统一按28天
if($month == '04' || $month == '06' || $month == '09' || $month == '11'){if($day>30){$day='30';}}//30天的月份
?>
<?php 
//序号与性别生成
if($order == null){$order = rand(0,999);}//如果不知道序号，将会随机生成
//区分性别
if($gender == 'female'){ $i = 0; while ($i <= $order-1): $i=$i+2; endwhile; $genderCode = $i;}
elseif($gender == 'male'){ $i = 1; while ($i <= $order-1): $i=$i+2; endwhile; $genderCode = $i;}

//位数校正，genderCode超过999会随机生成一个三位数
if($genderCode<=9){ $genderCode = '00'.$genderCode; }
elseif($genderCode<100 && $genderCode>=10){ $genderCode = '0'.$genderCode;}
elseif($genderCode>100){$genderCode = $genderCode;}
elseif($genderCode>999){$genderCode = rand(100,999);}
?>

<?php
if($day == null or $year == null or $gender == null or $genderCode == null){
	echo '<!--不是从desktop-enviroment.php来的，无需弹出错误提示-->';
	$greenCode = 1;
}
else{
	if($Name == null){
		echo '<div class="print">
				<h2 style="color:#f14">请正确填写必填选项</h2>
				<p>使用须知: <a href="https://github.com/Apiclo/ChinaID_Generate/blob/master/readme.md">readme.md</a></p>';
		echo '</div>';
	}
	else {
		echo'<!--必填项完整，无错误,可以开始计算-->';
		$complete = array_search($Name,$Codes).$year.$month.$day.$genderCode;
		function lastNum($str){
			$factor = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2); // 前17位的权重
			$c = array(1,0,'X',9,8,7,6,5,4,3,2); //模11后的对应校验码
			if(strlen($str)!=17){ exit('使用前请先阅读<a href="https://github.com/Apiclo/ChinaID_Generate/blob/master/readme.md">readme.md</a>');}
			$res = 0;
			for ($i=0; $i<17; $i++){ $res += intval($str[$i]) * $factor[$i];}
			return $c [$res % 11];
		}
		$lastNum = lastNum($complete); //最后一位是X
	}
}

?>
<?php
if($complete == null or $lastNum == null){echo '<center style="font-size: 1.6rem; margin:50px 0px;">输入有误，未能成功计算出第十八位校验码</center>';}
else{$finalId=$complete.$lastNum;}

include 'sqlcon.php';
if($_POST['action']=='update'){
		if(!($Name and $year and $month and $day and $gender)){
			echo '<center style="font-size: 2.6rem; margin:50px 0px;"><a href="javascript:onclick=history.go(-1)">输入不允许有误！点击返回</a></center>';
		}else{
			$sqlstr="update ids set id ='$finalId',area ='$Name',birthyear ='$year',birthmonth ='$month',birthday ='$day',gender ='$gender' where id = '$originId';";
			$result=mysqli_query($conn,$sqlstr);
			if($result){
				if(uaDist()=='mobile'){echo '<center style="font-size: 2.6rem; margin:50px 0px;"><a href="/package-manager-m.php">修改成功，点击查看</a></center>';}
				else{echo '<center style="font-size: 2.6rem; margin:50px 0px;"><a href="/package-manager.php">修改成功，点击查看</a></center>';}
					
			}	else{
				echo '<center style="font-size: 2.6rem; margin:50px 0px;"><a href="sqlupdate.php">修改失败，返回上页</a></center>'.$sqlstr;	
			}
		}
}
?>
