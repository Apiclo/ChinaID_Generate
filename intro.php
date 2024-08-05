<?php include 'contents/header.php';
error_reporting(0); ?>
<title>网站介绍</title>
</head>

<body>
    <?php include 'contents/navbar.php'; ?>
    <div id="container">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a href="index.php">证件介绍</a></li>
                <li><a href="release.php">使用说明</a></li>
                <li><a href="desktop-enviroment.php">开始使用</a></li>
                <li><a href="package-manager.php">历史记录</a></li>
                <li><a href="intro.php" style="background-color: #e95420;color: #fff;">网站介绍</a></li>
            </ul>
        </div>

        <div id="content">
            <div id="left">
                <iframe src="left-nav.html" width="140px" height="500px" frameborder="no"></iframe>
            </div>
            <div id="middle">

                <div class="mid-p">
                    <span>地址：</span><a href="https://apiclo.github.io" target="new">https://apiclo.github.io</a><br>
                    <span>本网站以Chromium91.0.864.41作为测试环境，为了您的浏览体验，请使用72以上版本的chromium内核浏览器或57以上版本的火狐浏览器</span>
                </div>
                <div class="item1 gnome">邮箱：<a href="mailto:apiclo@163.com">apiclo@163.com</a></div>
                <div class="item1 gnome"><a href="https://github.com/Apiclo">GitHUb主页：Apiclo</a></div>
            </div>
            <div id="right">


                <p class="search-title">页面备注</p>
                <div class="mark">若用户使用本网站生成的身份证号码从事法律禁止的活动，所造成的一切后果由用户自行承担。</div>
            </div>
        </div>
        <div id="footer">
            网站介绍/intro
            <a href="index.php">回到主页</a>
        </div>

    </div>
</body>

</html>
