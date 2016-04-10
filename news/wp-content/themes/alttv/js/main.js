$(document).ready(function(){
    var fontSize = parseInt($("#post-body p").css("font-size"));
    var lineHeight = parseInt($("#post-body p").css("line-height"));
    $("span#text-size-inc").on("click", function(){
        if(fontSize < 18){
            fontSize++;
            lineHeight++;
            $("#post-body p").css("font-size", fontSize + "px");
            $("#post-body p").css("line-height", lineHeight + "px");
        }
    });
    $("span#text-size-dec").on("click", function(){
        if(fontSize > 10){
            fontSize--;
            lineHeight--;
            $("#post-body p").css("font-size", fontSize + "px");
            $("#post-body p").css("line-height", lineHeight + "px");
        }
    });

    $("div#tab-button-1").on("click", function(){
        $(this).addClass("active-tab");
        $("div#tab-button-2").removeClass("active-tab");
        $("div#tab-button-3").removeClass("active-tab");

        $("div#tab1").css("display", "block");
        $("div#tab2").css("display", "none");
        $("div#tab3").css("display", "none");
    });
    $("div#tab-button-2").on("click", function(){
        $(this).addClass("active-tab");
        $("div#tab-button-1").removeClass("active-tab");
        $("div#tab-button-3").removeClass("active-tab");

        $("div#tab1").css("display", "none");
        $("div#tab2").css("display", "block");
        $("div#tab3").css("display", "none");
    });
    $("div#tab-button-3").on("click", function(){
        $(this).addClass("active-tab");
        $("div#tab-button-1").removeClass("active-tab");
        $("div#tab-button-2").removeClass("active-tab");

        $("div#tab1").css("display", "none");
        $("div#tab2").css("display", "none");
        $("div#tab3").css("display", "block");

        initialize();
    });

    $("#modal-close").click(function(){
        $("#modal-bgr").hide();
        $(".modal-body").hide();
        $(".modal-loader").show();
        $("#modal-bgr .modal-post-title").text("");
        $("#modal-bgr .modal-post-content").text("");
    });

    $("body").click(function(e){
        var Elem = e.target;
        if (Elem.id == "modal-bgr"){
            $("#modal-close").trigger("click");
        }
    });
});