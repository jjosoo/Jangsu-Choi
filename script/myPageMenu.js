$(function(){
    $(".myPage_Menu > ul > li").mouseover(function(){
        $(this).find(".myPage_SubMenu").stop().slideDown();
    });
    $(".myPage_Menu > ul > li").mouseout(function(){
        $(this).find(".myPage_SubMenu").stop().slideUp();
    });
})