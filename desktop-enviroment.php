<?php include 'contents/header.php';
error_reporting(0); ?>
<title>开始使用</title>
</head>

<body>
    <?php include 'contents/navbar.php'; ?>
    <div id="container">
        <div id="header"></div>
        <div id="nav">
            <ul>
                <li><a href="index.php">证件介绍</a></li>
                <li><a href="release.php">使用说明</a></li>
                <li><a href="desktop-enviroment.php" style="background-color: #e95420;color: #fff;">开始使用</a></li>
                <li><a href="package-manager.php">历史记录</a></li>
                <li><a href="intro.php">网站介绍</a></li>
            </ul>
        </div>

        <div id="content">
            <div id="left">
                <iframe src="left-nav.html" width="140px" height="500px" frameborder="no"></iframe>
            </div>
            <div id="middle">
                <div class="mark" style="margin-left:13px">本页面可以个性化定制想要的身份证号码<br>
                    您可以自定义号码的地区，出生日期和性别信息<br>
                    出生序号是指对同地区、同年、月、日出生的人员编定的顺序号。<br>
                    其中第十七位奇数分给男性，偶数分给女性。<br>
                    为了节省服务器资源与性能，每次仅能生成一串身份证号码</div>
                <div class="mid-up">
                    <form action="package-manager.php" method="post">
                        <div class="form" style="width:480px;transform:translateX(3px)">
                            <div class="form-countainer">
                                <div class="form-line1">
                                    <div class="form-title">地区<span style="color:#f00;font-size:1.25rem;">*</span></div>
                                    <input type="text" class="input-bar" name="areaInput" />
                                    <div class="lookup"><a href="ID_Generate/lookup.php">查询</a></div>
                                </div>
                                <div class="form-line1">
                                    <div class="form-title">生日<span style="color:#f00;font-size:1.25rem;">*</span></div>
                                    <?php include 'ID_Generate/date-select.php' ?>
                                </div>
                                <div class="form-line1">
                                    <div class="form-title">性别<span style="color:#f00;font-size:1.25rem;">*</span></div>
                                    <select name="genderInput" class="select">
                                        <option value="male" name="male">男</option>
                                        <option value="female" name="female">女</option>
                                    </select>
                                </div>
                                <div class="form-line1">
                                    <div class="form-title">出生序号(可不填)</div><input type="num" class="input-bar"
                                        name="orderInput" />
                                </div>

                            </div>
                            <div class="generate">
                                <input type="submit" class="button" value="生成" />
                            </div>
                        </div>
                    </form>
                </div>




            </div>
            <div id="right">


                <p class="search-title">页面备注</p>
                <p class="mark">输入一些必要的基本信息(<span style="color:#f00;font-size:1.25rem;">*</span>为必填)，点击生成按钮即可生成一串身份证号码
                </p>


            </div>
        </div>

    </div>
</body>

</html>
