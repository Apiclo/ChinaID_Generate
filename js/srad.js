window.onload = function () {
    var wrap = document.getElementById('wrap'),
        wrapBox = document.getElementById('wrap-box'),
        liBtn = document.querySelectorAll('#btn-list li'),
        index = 0,
        timer = null;



    if (timer) {
        clearInterval(timer);
        timer = null;
    }
    timer = setInterval(autoplay, 1000);


    function autoplay() {
        index++;
        if (index >= liBtn.length) {
            index = 0;
        }
        changeImg(index);
    }

    function changeImg(curIndex) {
        for (var i = 0; i < liBtn.length; i++) {
            liBtn[i].className = '';
            wrapBox.style.left = 0;
        }
        liBtn[curIndex].className = 'active';
        wrapBox.style.left = -curIndex * 512 + 'px';
        index = curIndex;
    }


    wrap.onmouseover = function () {
        clearInterval(timer);
    }
    wrap.onmouseout = function () {
        timer = setInterval(autoplay, 3500);
    }
    for (var j = 0; j < liBtn.length; j++) {
        liBtn[j].order = j;
        liBtn[j].onmouseover = function () {
            clearInterval(timer);
            changeImg(this.order);
        }
    }
}