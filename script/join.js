$(document).ready(function(){
    var isYActive = true;

    $(".joinBox__member-y").click(function(){
        if (!isYActive) {
            swapStyles(".joinBox__member-y", ".joinBox__member-n");
            $(".joinBox__company").hide();
            $(".joinBox__main-join").show();
            isYActive = true;
        }
    });

    $(".joinBox__member-n").click(function(){
        if (isYActive) {
            swapStyles(".joinBox__member-y", ".joinBox__member-n");
            $(".joinBox__main-join").hide();
            $(".joinBox__company").show();
            isYActive = false;
        }
    });

    function swapStyles(selector1, selector2) {
        // 스타일 교환
        var tempBackgroundColor = $(selector1).css("background-color");
        var tempBorder = $(selector1).css("border");
        var tempFontWeight = $(selector1).css("font-weight");
        
        $(selector1).css({
            "background-color": $(selector2).css("background-color"),
            "border": $(selector2).css("border"),
            "font-weight": $(selector2).css("font-weight")
        });

        $(selector2).css({
            "background-color": tempBackgroundColor,
            "border": tempBorder,
            "font-weight": tempFontWeight
        });
    }
});
