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
$logo = '<a href="#"><img class="logo" width="36" height="36" src="../img/logo-black.png"></a>'."\n";
$navItemOne = '<a href="http://www.ip33.com/shenfenzheng.html"'.$navDist.'>合法性校验</a>'."\n";
$navItemTwo = '<a href="#"'.$navDist.'>在Github上查看</a>'."\n";
$floatR = '<div class="item-content">';
?>

<div class="navbar-bg">
    <div class="navbar-texture">
        <div class="navbar-content">
            <?php
                echo $logo;
                echo $floatR;
                echo $navItemOne;
                echo $navItemTwo;
                echo '</div>'
            ?>
        </div>
    </div>
</div>