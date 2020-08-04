<?php
function lastNum($str){
    $factor = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2); // 前17位的权重
    $c = array(1,0,'X',9,8,7,6,5,4,3,2); //模11后的对应校验码
    if(strlen($str)!=17){
        exit('请输入17位有效数字');
    }
    $res = 0;
    for ($i=0; $i<17; $i++){
        $res += intval($str[$i]) * $factor[$i];
    }
    return $c [$res % 11];
}
?>