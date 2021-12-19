<meta charset="utf-8">
<?php
$id = $_GET['id'];
include 'sqlcon.php';
if ($_GET['act'] == 'del') {
	$sqlstr = "delete from ids where id='$id';";
	$result = mysqli_query($conn, $sqlstr);
	if ($result) {
		echo "<script>alert('删除成功');location='/package-manager.php';</script>";
	} else {
		echo "<script>alert('删除失败');location='/package-manager.php';</script>";
	}
}
?>