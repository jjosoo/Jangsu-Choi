$(document).ready(function(){
    var isYActive = true;

    // $(".loginBox__member-y").click(function(){
    //     if (!isYActive) {
    //         swapStyles(".loginBox__member-y", ".loginBox__member-n");
    //         $(".loginBox__form_no").hide();
    //         $(".loginBox__form").show();
    //         isYActive = true;
    //     }
    // });

    // $(".loginBox__member-n").click(function(){
    //     if (isYActive) {
    //         swapStyles(".loginBox__member-y", ".loginBox__member-n");
    //         $(".loginBox__form").hide();
    //         $(".loginBox__form_no").show();
    //         isYActive = false;
    //     }
    // });

    $(".loginBox__member-y").click(function(){
        if (!isYActive) {
            swapStyles(".loginBox__member-y", ".loginBox__member-n");
            $(".loginBox__form_no").addClass("hidden");
            $(".loginBox__form").removeClass("hidden");
            isYActive = true;
        }
    });
    
    $(".loginBox__member-n").click(function(){
        if (isYActive) {
            swapStyles(".loginBox__member-y", ".loginBox__member-n");
            $(".loginBox__form").addClass("hidden");
            $(".loginBox__form_no").removeClass("hidden");
            isYActive = false;
        }
    });
    

    function swapStyles(selector1, selector2) {
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


