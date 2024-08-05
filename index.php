<?php include 'contents/header.php'; error_reporting(0);?>
<!--标准布局-->
<title>计算器</title>
</head>

<body>
    <!--导航栏-->

    <?php include 'contents/navbar.php'?>

    <!--功能切换-->
    <?php /*
        if (uaDist()=='mobile'){include 'ID_Generate/id_generate.php';}
        elseif(uaDist()=='desktop'){include 'static-index.html';}*/
        ?>
    <?php //include 'ID_Generate/id_generate.php'//简洁排版?>
    <?php include 'static-index.html'//HTML首页?>
    <?php //include 'height.php'//身高计算?>
    <?php //include 'contents/sign_up.php'//注册?>

    <!--Footer-->
    <?php include 'contents/footer.php'?>
