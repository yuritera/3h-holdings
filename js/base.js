window.onload = function () {
  const menuView = document.getElementById('naviWrap');
  const spToggle = document.getElementById('naviBtn');
  const spClose = document.getElementById('naviClose');
  const navibg = document.getElementById('naviBg');
  spToggle.onclick = navToggle;
  spClose.onclick = spWrapClose;
  navibg.onclick = spWrapClose;
  function navToggle() {
    let menuViewClass = menuView.getAttribute('class');
    if (menuViewClass == 'header_navi active') {
      menuView.classList.remove('active');
    } else {
      menuView.classList.add('active');
    }
    event.stopPropagation();
  }
  function spWrapClose() {
    let menuViewClass = menuView.getAttribute('class');
    if (menuViewClass == 'header_navi active') {
      menuView.classList.remove('active');
    } else {
      ;
    }
    event.stopPropagation();
  }
  function opennavi(e) {
    let parentEle = e.srcElement.parentElement;
    let tabList = parentEle.children;
    let targetEle;
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
  const el = document.getElementById('hdNaviList');
  el.onclick = opennavi;
  const el2 = document.getElementById('ftNaviList');
  el2.onclick = opennavi;
  const el3 = document.getElementById('ftNaviList2');
  el3.onclick = opennavi;
  const el4 = document.getElementById('ftNaviList3');
  el4.onclick = opennavi;
}
