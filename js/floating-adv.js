window.onload = function(){
    var fltadv = document.getElementById('fltadv');
    var sx = sy = 10;
    var x = y = 0;

    function move(){
        if(document.documentElement.clientWidth - fltadv.offsetWidth-10 < x || x < 0){
            sx = -sx;
        }

        if(document.documentElement.clientHeight - fltadv.offsetHeight-10 < y || y < 0){
            sy = -sy;
        }

        x = fltadv.offsetLeft + sx;
        y = fltadv.offsetTop + sy;

        fltadv.style.left = x + 'px';
        fltadv.style.top = y + 'px';
    }

    var timer = setInterval(move, 100);

    fltadv.onmouseover = function(){
        clearInterval(timer);
    }

    fltadv.onmouseout = function(){
        timer = setInterval(move, 100);
    }
}
