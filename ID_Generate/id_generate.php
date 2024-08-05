<?php function postDist(){if(uaDist() == 'mobile'){return 'class="post-mobile"';}else{return 'class="post-desktop"';}}?>
<?php echo "<div ".postDist().">";?>
<!--表单部分-->
<form action="/package-manager-m.php" method="post">
    <div class="form">
        <div class="form-countainer">
            <div class="form-line1">
                <div class="form-title">地区</div><input type="text" class="input-bar" name="areaInput" />
                <div class="lookup"><a href="ID_Generate/lookup.php">查询</a></div>
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
                <div class="form-title">出生序号(可不填)</div><input type="num" class="input-bar" name="orderInput" />
            </div>
        </div>
        <div class="generate">
            <input type="submit" class="button" value="生成" />
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
<?php
if($Name == null or $day == null or $year == null or $gender == null or $genderCode == null){
    echo '<div class="print">';
    echo '
        <h2 style="color:#f14">当你看到这句话时，说明你是第一次浏览，或者是已经出错</h2>

        <h3 style="color:#ff1275">重要：由于数据库出错，删除历史记录功能正在维护中，请等待维护完成，造成不便敬请谅解</h3>
        <br><br>
        <h3 style="color:#ff1275">默认情况与使用说明</h3>

        <ol>
        <li>在2月输入超过28日，平年会被默认到28日，闰年是29日。</li>
        <li>在只有30天的月份输入31日，会被默认为30日。</li>
        <li>在没输入出生顺序的情况下，会随机选出一个序号（性别不会被随机）。</li>
        <li>城市/地区名事需要严格按照数组内容填写。    </li>
        </ol>

        <h3 style="color:#f25">已知问题：</h3>

        <ol>
        <li>输入地名时必须要与$Codes数组中的value完全一致。</li>
        <li>第15~17位我至今没搞清楚具体怎么算。目前解决办法是随机，或者手动输入。</li>
        </ol>
        <p>主要代码都在: <a href="https://github.com/Apiclo/ChinaID_Generate/blob/master/package-manager.php">package-manager.php</a>  </p>
        ';
    echo '</div>';
}
else {
    echo'<center>已生成</center>';
}
?>
</div>
