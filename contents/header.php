<?php //识别移动设备和桌面设备，没识别出来按桌面处理
    function uaDist(){
        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        if(preg_match("/intel|mac os|windows|desktop|ubuntu|x86|centos/i", $userAgent)) {
            return 'desktop';
        }
        elseif(preg_match("/android|iphone|mobile|quark|al00/i", $userAgent)){
            return 'mobile';
        }
        else{
            return 'desktop';
        }
    }
?>

<?php
$cssLink =  "<link rel=\"stylesheet\" href=\"../css";
$header = "
<!DOCTYPE html>
<html>
<head>
<meta charset=\"utf-8\"/>
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no\"/>
$cssLink/style.css\">
$cssLink/jscss.css\">
<script language=\"javascript\" src=\"ID_Generate/area.js\"></script>";
echo $header;
?>
