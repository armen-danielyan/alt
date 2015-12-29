$(document).ready(function(){
    var fontSize = parseInt($("#post-body p").css("font-size"));
    $("span#text-size-inc").on("click", function(){
        if(fontSize < 18){
            fontSize++;
            $("#post-body p").css("font-size", fontSize + "px");
        }
    });
    $("span#text-size-dec").on("click", function(){
        if(fontSize > 10){
            fontSize--;
            $("#post-body p").css("font-size", fontSize + "px");
        }
    });
});