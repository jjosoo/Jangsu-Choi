// 상단 카테고리 375이하 기기 스크롤 이동

var dviswidth = window.innerWidth;

if( dviswidth < 375){

    var hemenucon = document.querySelector('.header-menu-cont');
    hemenucon.scrollLeft = 15;
}