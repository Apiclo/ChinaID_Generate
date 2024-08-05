<meta charset="utf-8">
<?php
function uaDist()
{
	$userAgent = $_SERVER['HTTP_USER_AGENT'];
	if (preg_match("/intel|windows|desktop|ubuntu|x86|centos/i", $userAgent)) {
		return 'desktop';
	} elseif (preg_match("/android|iphone|vivo|xiaomi|oppo|huawei|vivo|iphone_os|mobile|quark|al00/i", $userAgent)) {
		return 'mobile';
	} else {
		return 'desktop';
	}
}
function returnpage()
{
	if (uaDist() == 'mobile') {
		return 'package-manager-m.php';
	} elseif (uaDist() == 'desktop') {
		return 'package-manager.php';
	}
}
$id = $_GET['id'];
include 'sqlcon.php';
if ($_GET['act'] == 'del') {
	$sqlstr = "delete from ids where id='$id';";
	$result = mysqli_query($conn, $sqlstr);
	if ($result) {
		echo '<script>alert("删除成功");location="/' . returnpage() . '";</script>';
	} else {
		echo '<script>alert("删除失败");location="/' . returnpage() . '";</script>';
	}
}
?>
