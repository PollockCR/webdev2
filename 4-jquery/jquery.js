$(".btn").click(function() {
    if ($(this).hasClass("active")){
        $(this).removeClass("active");
        $(this).addClass("inactive");
        hidePanel($(this).attr("id"));
        
    } else {
        $(this).addClass("active");
        $(this).removeClass("inactive");
        showPanel($(this).attr("id"));
    }
});

function showPanel(id){
    switch (id) {
        case "htmlButton":
            $("#html").show();
            break;
        case "cssButton":
            $("#css").show();
            break;
        case "javascriptButton":
            $("#javascript").show();
            break;
        case "outputButton":
            $("#output").show();
            break;
    }
}

function hidePanel(id){
    switch (id) {
        case "htmlButton":
            $("#html").hide();
            break;
        case "cssButton":
            $("#css").hide();
            break;
        case "javascriptButton":
            $("#javascript").hide();
            break;
        case "outputButton":
            $("#output").hide();
            break;
    }
}