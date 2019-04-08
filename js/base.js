window.onload = function () {
  var menuView = document.getElementById('naviWrap');
  var spToggle = document.getElementById('naviBtn');
  var spClose = document.getElementById('naviClose');
  var navibg = document.getElementById('naviBg');
  spToggle.onclick = navToggle;
  spClose.onclick = spWrapClose;
  navibg.onclick = spWrapClose;
  function navToggle() {
    var menuViewClass = menuView.getAttribute('class');
    if (menuViewClass == 'header_navi active') {
      menuView.classList.remove('active');
    } else {
      menuView.classList.add('active');
    }
    event.stopPropagation();
  }
  function spWrapClose() {
    var menuViewClass = menuView.getAttribute('class');
    if (menuViewClass == 'header_navi active') {
      menuView.classList.remove('active');
    } else {
      ;
    }
    event.stopPropagation();
  }
  function opennavi(e) {
    var parentEle = e.srcElement.parentElement;
    var tabList = parentEle.children;
    var targetEle;
    if (e.target.tagName == 'A') {
      targetEle = e.target.parentNode;
    } else {
      targetEle = e.target;
    }
    if (targetEle.classList.contains('active') == true) {
      targetEle.classList.remove('active');
    } else {
      for (var i = 0; i < tabList.length; i++) {
        tabList[i].classList.remove('active');
      }
      targetEle.classList.add('active');
    }
  }
  var el = document.getElementById('hdNaviList');
  el.onclick = opennavi;
  var el2 = document.getElementById('ftNaviList');
  el2.onclick = opennavi;
  var el3 = document.getElementById('ftNaviList2');
  el3.onclick = opennavi;
  var el4 = document.getElementById('ftNaviList3');
  el4.onclick = opennavi;
}
