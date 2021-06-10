<?php
function navDist(){
    if(uaDist() == 'mobile'){
        return 'class="nav-mobile"';
    }
    elseif(uaDist() == 'desktop'){
        return 'class="nav-desktop"';
    }
    else{
        return 'class="nav-desktop"';
    }
}
$navDist = navDist();
$logo = '<a href="index.php"><img class="logo" width="36" height="36" src="../img/logo-black.png"></a>'."\n";
$title = '<a href="index.php" class="title">身份证号码管理系统</a>';
$navItemOne = '<a href="http://www.ip33.com/shenfenzheng.html"'.$navDist.'>合法性校验</a>'."\n";
$navItemTwo = '<a href="/index-m.php"'.$navDist.'>简洁版</a>'."\n";
$navItemTree = '<a href="/index.php"'.$navDist.'>桌面版</a>'."\n";
$navItemFour = '<a href="https://github.com/Apiclo/ChinaID_Generate"'.$navDist.'>在Github上查看</a>'."\n";
$floatR = '<div class="item-content">';
?>

<div class="navbar-bg">
    <div class="navbar-texture">
        <div class="navbar-content">
            <?php
                echo $logo;
                if(uaDist()=='mobile'){}
                else{echo $title;}
                echo $floatR;
                echo $navItemOne;
                if(uaDist()=='mobile'){}
                else{
                echo $navItemTwo;
                echo $navItemTree;}
                echo $navItemFour;
                echo '</div>'
            ?>
        </div>
    </div>
</div>