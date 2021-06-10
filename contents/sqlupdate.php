<meta charset="utf-8">
<?php
$id=$_GET['id'];
include 'header.php';
include 'navbar.php';
include 'sqlcon.php';
if($conn){
		echo '<br>';
		}else{
			echo '参数错误';
			}
if ($_GET['action']=='update'){
	$sqlstr="select * from ids where id='$id'";
	$result=mysqli_query($conn,$sqlstr);
	if($conn){
		echo '<br>';
		}
	$row=mysqli_fetch_row($result);
}


?>
<form action="sqlupload.php" method="post">
    <div class="form">
        <div class="form-countainer">
            <div class="form-line1">
                <div class="form-title">地区:<?php echo $row[1]; ?></div><input type="text" class="input-bar" name="areaInput" value=""/><div class="lookup"><a href="ID_Generate/lookup.php">查询</a></div>
            </div>
            <div class="form-line1">
                <div class="form-title">生日:<?php echo $row[2].'年'.$row[3].'月'.$row[4].'日'; ?></div><?php include '../ID_Generate/date-select.php'?>
            </div>
            <div class="form-line1">
                <div class="form-title">性别:<?php if($row[5]=='female'){echo '女';}else{echo '男';} ?></div><select name="genderInput" class="select">
                    <option value="male" name="male">男</option>
                    <option value="female" name="female">女</option>
                </select>
            </div>
            <div class="form-line1">
                <div class="form-title">出生序号(可不填)</div><input type="num" class="input-bar" name="orderInput"/>
                <input name="originId" type="hidden" value="<?php echo $row[0]; ?>"/>
                <input name="action" type="hidden" value="update" /><br>
            </div>
        </div>
            <div class="generate">
                <input type="submit" class="button" value="更新"/>
                <input type="reset" class="button" name="reset" value="重置" /><br>
            </div>
    </div>
</form>