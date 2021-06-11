<select name="yearInput" class="select">
    <!--目前可选：从1910年 1月 1日，至 2025 年 12月 31日-->
    <?php for($y=2025;$y>=1910;$y--){
            echo '<option value="'.$y.'" name="'.$y.'">'.$y.'年</option>';
        }?>
</select>
<select name="monthInput" class="select">
    <?php for($m=1;$m<=12;$m++){
            echo '<option value="'.$m.'" name="'.$m.'">'.$m.'月</option>';
        }?>
</select>

</select>
<select name="dayInput" class="select">
    <?php for($d=1;$d<=31;$d++){
            echo '<option value="'.$d.'" name="'.$d.'">'.$d.'日</option>';
        }?>
</select>
