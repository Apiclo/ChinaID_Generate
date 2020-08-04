<?php 
include '../contents/header.php'; 
echo '<title>代码查询</title>';
echo '<p>使用ctrl+f或command+f可在页面上搜索</p><br>';
echo '<p>技术有限，暂时只能通过区名检索前六位</p>';

include 'areacode.php';
echo '<pre>';
print_r ($Codes);
echo'</pre>';?>
</body>
</html>