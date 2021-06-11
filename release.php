<?php include 'contents/header.php'; error_reporting(0);?>
<title>使用说明</title>
</head>

<body>
    <?php include 'contents/navbar.php'; ?>
    <div id="container">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a href="index.php">证件介绍</a></li>
                <li><a href="release.php" style="background-color: #e95420;color: #fff;">使用说明</a></li>
                <li><a href="desktop-enviroment.php">开始使用</a></li>
                <li><a href="package-manager.php">历史记录</a></li>
                <li><a href="intro.php">网站介绍</a></li>
            </ul>
        </div>

        <div id="content">
            <div id="left">
                <iframe src="left-nav.html" width="140px" height="500px" frameborder="no"></iframe>
            </div>

            <div id="middle">
                <div class="mid-up">
                    <h3 class="mid-p" style="color:#ff1275">使用说明：</h3>
                    <div class="item1 gnome">城市/地区名事需要严格按照数组内容填写,输入地名时必须要与$Codes数组中的value完全一致</div>
                    <div class="item1 gnome">本管理系统支持移动端，完美兼容安卓/iOS设备等移动设备(使用您的浏览器UA进行判断)</div>
                    <div class="item1 gnome">本系统生成的身份证号码都是真是的身份证号码，可以顺利通过校验，请勿用于违法犯罪活动！</div>
                </div>

                <div class="mid-up">
                    <h3 class="mid-p" style="color:#ff1275">特殊情况：</h3>
                    <div class="item1 gnome">在2月输入超过28日的情况下，并不会报错，平年会强制改为28日，闰年强制改为29日</div>
                    <div class="item1 gnome">同上，在只有30天的月份输入31日时，会被默认为30日。</div>
                    <div class="item1 gnome">在没有输入出生顺序时，会随机一个序号，但是如果你记得并且输入正确了，会算出来你真正的身份证号码</div>
                </div>

                <div class="mid-down">
                    <h3 class="mid-p" style="color:#f25">已知问题：</h3>
                    <div class="mid-p">部分页面存在兼容问题，请使用Chromium72以上，火狐57以上，Safari12以上版本的浏览器</div>
                    <div class="mid-p">在“历史记录”页面中，当号码最后一位是X时，会无法删除</div>
                    <div class="mid-p">主要代码都在: <a
                            href="https://github.com/Apiclo/ChinaID_Generate/blob/master/package-manager.php">package-manager.php</a>
                    </div>
                </div>

            </div>
            <div id="right">


                <p class="search-title">页面备注</p>
                <div class="mark">学号：196102010650</div>

            </div>
        </div>
        <div id="footer">
            使用说明/Release
            <a href="index.php">回到主页</a>
        </div>

    </div>
</body>

</html>
