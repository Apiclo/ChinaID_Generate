<?php function postDist(){if(uaDist() == 'mobile'){return 'class="post-mobile"';}else{return 'class="post-desktop"';}}?>
<?php echo "<div ".postDist().">";?>
<!--表单部分-->
<form action="index.php" method="post">
    <div class="form">
        <div class="form-countainer">
            <div class="form-line1">
                <div class="form-title">地区</div><input type="text" class="input-bar" name="areaInput"/><div class="lookup"><a href="ID_Generate/lookup.php">查询</a></div>
            </div>
            <div class="form-line1">
                <div class="form-title">生日</div><?php include 'date-select.php'?>
            </div>
            <div class="form-line1">
                <div class="form-title">性别</div><select name="genderInput" class="select">
                    <option value="male" name="male">男</option>
                    <option value="female" name="female">女</option>
                </select>
            </div>
            <div class="form-line1">
                <div class="form-title">在您当地您是当日第几个出生者？</div><input type="num" class="input-bar" name="orderInput"/>
            </div>
        </div>
            <div class="generate">
                <input type="submit" class="button" value="生成"/>
            </div>
    </div>
</form>
<!---PHP部分-->
<?php
    include 'areacode.php';//地区转代码
    $Name = $_POST['areaInput'];//地区代码
    $year = $_POST['yearInput'];//年份
    $month = $_POST['monthInput'];//月份
    $day = $_POST['dayInput'];//日期
    $gender = $_POST['genderInput'];//性别
    $order = $_POST['orderInput'];//序号
?>
<?php //if($Name == null){ echo '<script> alert ("地区为必填项")</script>';}?>
<?php //日期矫正
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
?>

<div class="print">
    <p>已生成的身份证号：<br>
        <?php echo $complete.$lastNum;?></p>
</div>
</div>
