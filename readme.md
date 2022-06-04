# 中国第二代身份证号码生成器  
目前十分臃肿，而且有大量冗余代码，至少能用，应付大专毕设。 

Demo: [learning.siralop.top](https://learning.siralop.top/) 

主要代码都在: [/desktop-environment.php](https://github.com/Apiclo/ChinaID_Generate/blob/master/desktop-environment.php)  和 [/package-manager.php](https://github.com/Apiclo/ChinaID_Generate/blob/master/package-manager.php)  
## 默认情况与使用说明
1. 城市/地区名事需要严格按照数组内容填写,输入地名时必须要与$Codes数组中的value完全一致
2. 本管理系统支持移动端，完美兼容安卓/iOS设备等移动设备(使用您的浏览器UA进行判断)
3. 本系统生成的身份证号码都是真是的身份证号码，可以顺利通过校验，请勿用于违法犯罪活动！
4. 在2月输入超过28日的情况下，并不会报错，平年会强制改为28日，闰年强制改为29日
5. 同上，在只有30天的月份输入31日时，会被默认为30日。
6. 在没有输入出生顺序时，会随机一个序号，但是如果你记得并且输入正确了，会算出来你真正的身份证号码    

## 已知问题： 
1. 部分页面存在兼容问题，请使用Chromium72以上，火狐57以上，Safari12以上版本的浏览器 
2. 输入地名时必须要与$Codes数组中的value完全一致。
3. ~~前端布局很垃圾，尽量用桌面设备访问，我懒得布局。~~

## TODO List:
1. ~~加上闰年识别。~~
2. ~~优化页面布局。~~
3. 换一个更方便的城市/地区选择方式。
4. 代码优化。
