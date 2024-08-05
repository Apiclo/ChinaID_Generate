<?php include 'contents/header.php';
error_reporting(0); ?>
<title>历史记录</title>
</head>

<body>
    <?php include 'contents/navbar.php'; ?>

    <!---PHP部分-->


    <?php
	include 'ID_Generate/areacode.php'; //地区转代码
	$Name = $_POST['areaInput']; //地区代码
	$year = $_POST['yearInput']; //年份
	$month = $_POST['monthInput']; //月份
	$day = $_POST['dayInput']; //日期
	$gender = $_POST['genderInput']; //性别
	$order = $_POST['orderInput']; //序号
	$gentime = time(); //生成时间
	?>


    <?php //if($Name == null){ echo '<script> alert ("地区为必填项")</script>';}
	?>
    <?php //日期矫正
	$month = str_pad($month, 2, "0", STR_PAD_LEFT); //在例如1月-9月时，会在前加一个0来补够两位数
	$day = str_pad($day, 2, "0", STR_PAD_LEFT); //同上

	if ($month == 02 && $day > 28) { //判断二月份的平闰年，超过28号的，闰年强制成29号，平年强制成28号
		if ($year % 100 == 0) {
			if ($year % 400 == 0 && $year % 3200 != 0) {
				$day = '29';
			} else {
				$day = '28';
			}
		} else {
			if ($year % 4 == 0 && $year % 100 != 0) {
				$day = '29';
			} else {
				$day = '28';
			}
		}
	}

	if ($month == '04' || $month == '06' || $month == '09' || $month == '11') {
		if ($day > 30) {
			$day = '30';
		}
	} //在只有30天的月份输入31号会强制成30号
	?>
    <?php
	//序号与性别生成
	if ($order == null) {
		$order = rand(0, 999);
	} //如果不知道序号，将会随机生成
	//区分性别
	if ($gender == 'female') {
		$i = 0;
		while ($i <= $order - 1) : $i = $i + 2;
		endwhile;
		$genderCode = $i;
	} elseif ($gender == 'male') {
		$i = 1;
		while ($i <= $order - 1) : $i = $i + 2;
		endwhile;
		$genderCode = $i;
	}

	//位数校正，genderCode超过999会随机生成一个三位数，同时性别有几率被随机
	if ($genderCode <= 9) {
		$genderCode = '00' . $genderCode;
	} elseif ($genderCode < 100 && $genderCode >= 10) {
		$genderCode = '0' . $genderCode;
	} elseif ($genderCode > 100) {
		$genderCode = $genderCode;
	} elseif ($genderCode > 999) {
		$genderCode = rand(100, 999);
	}
	?>

    <?php
	if ($day == null or $year == null or $gender == null or $genderCode == null) {
		echo '<!--不是从desktop-enviroment.php来的，无需弹出错误提示-->';
		$greenCode = 1;
	} else {
		if ($Name == null) {
			echo '<div class="print">
				<h2 style="color:#f14">请正确填写必填选项</h2>
				<p>使用前请先阅读<a href="https://github.com/Apiclo/ChinaID_Generate/blob/master/readme.md">readme.md</a>';
			echo '</div>';
		} else {
			echo '<!--必填项完整，无错误,可以开始计算-->';
			$complete = array_search($Name, $Codes) . $year . $month . $day . $genderCode;
			function lastNum($str)
			{
				$factor = array(7, 9, 10, 5, 8, 4, 2, 1, 6, 3, 7, 9, 10, 5, 8, 4, 2); // 前17位的权重
				$c = array(1, 0, 'X', 9, 8, 7, 6, 5, 4, 3, 2); //模11后的对应校验码
				if (strlen($str) != 17) {
					exit('使用前请先阅读<a href="https://github.com/Apiclo/ChinaID_Generate/blob/master/readme.md">readme.md</a>');
				}
				$res = 0;
				for ($i = 0; $i < 17; $i++) {
					$res += intval($str[$i]) * $factor[$i];
				}
				return $c[$res % 11];
			}
			$lastNum = lastNum($complete); //最后一位是X
		}
	}

	?>


    <div class="print" <?php if ($greenCode == 1 or $Name == null) {
							echo 'style="display:none;"';
						} ?>>
        <h3>已生成的身份证号：</h3>
        <h2><?php echo $complete . $lastNum; ?></h2>

        <span>出生地区：<?php echo $Name ?></span><br>
        <span>出生日期：<?php echo $year . '年' . $month . '月' . $day . '日' ?></span><br>
        <span>性别：<?php if ($gender == 'female') {
						echo '女性';
					} else {
						echo '男性';
					} ?></span><br>
        <span>校验码<?php echo $lastNum ?>是否正确：<?php echo '是<!--已经经过lastNum()计算的，必然是正确的，否则会报错，并且不会生成-->'; ?></span><br>
        <span>请求时间：<?php date_default_timezone_set("PRC");
					echo date("m月d日,H:i:s", $gentime); ?></span><br>
        <a onclick="window.location.reload();"
            style="font-size:1.25rem;border-radius: 50px;border: #e95420 2px solid;padding:2px 20px;">再来一条</a>
        <?php
		$finalId = $complete . $lastNum;
		include 'contents/sqlcon.php';
		if ($month == 00 or $day == 00 or $Name == null) {
			echo '<!--????????????????????????????-->';
		} else {
			$result = mysqli_query($conn, "insert into ids (id,area,birthyear,birthmonth,birthday,gender,gentime) values ('$finalId','$Name','$year','$month','$day','$gender','$gentime');");
		} ?>
    </div>

    <?php
	$page = empty($_GET['page']) ? 1 : $_GET['page'];
	$selectid = mysqli_query($conn, "SELECT id FROM ids;");
	$num_rows = mysqli_num_rows($selectid);
	//每页显示的条数
	$pageNum = 9;
	//根据每页显示数求出总页数
	$pageCount = ceil($num_rows / $pageNum);
	//根据总页数求出偏移量
	$offset = ($page - 1) * $pageNum;

	$next = $page + 1;
	$prev = $page - 1;

	if ($next > $pageCount) {
		$next = $pageCount;
	}
	if ($prev <= 0) {
		$prev = 1;
	}
	$selectallstr = "SELECT id,area,birthyear,birthmonth,birthday,gender FROM ids ORDER BY gentime DESC limit " . $offset . ',' . $pageNum;
	$selectall = mysqli_query($conn, $selectallstr);
	?>
    <div class="print">
        <?php
		print "<p>网站共生成过 $num_rows 条历史身份证号</p>\n";
		echo '<style>
						table{border-spacing:0px; width:485px;margin:10px 0px;}
						
						td{border:1px solid #fff; text-align:center;}
					</style>';
		echo '<table>';
		echo '<tr style="color:#effefe" font-weight:bold;;><td>身份证号码</td><td>地区</td><td>年份</td><td>月份</td><td>日期</td><td>性别</td><td colspan="2">操作</td></tr>';
		while ($row = mysqli_fetch_row($selectall)) {
			echo '<tr>';
			for ($i = 0; $i < count($row); $i++) {
				echo '<td>' . $row[$i] . '</td>';
			}
			if ($row[4] != null) {
			    echo '<td><a style="color:#6e6;" href=/contents/sqlupdate.php?action=update&id='.$row[0].'>修改</a></td><td><a href=/contents/sqldel.php?act=del&id='.$row[0]." onclick='return.del();'>删除</a></td>";}
				echo '</tr>';
		}

		echo '</table>';
		echo "<a href='package-manager-m.php?page=1'>首页</a>  <a href='package-manager-m.php?page=$prev'>上一页</a> <a href='package-manager-m.php?page=$next'>下一页</a> <a href='package-manager-m.php?page=$pageCount'> 尾页</a>      ";
		mysqli_close($conn);
		?>

    </div>

    </div>


    </html>
