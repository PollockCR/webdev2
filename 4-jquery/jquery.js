function firstLoad(){
    
    $(".btn").each(function () {
        
        if ($(this).hasClass("active")){
            showPanel($(this).attr("id"));
        } else {
            hidePanel($(this).attr("id"));
        }
        
    })
}

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
    
    var panelId = "#" + id.slice(0, id.indexOf("Button"));
    $(panelId).show();
    
    fixPanelSize();
}

function hidePanel(id){
    
    var panelId = "#" + id.slice(0, id.indexOf("Button"));
    $(panelId).hide();
    
    fixPanelSize();
    
}

function fixPanelSize(){
    
    $(".contentPanel").each(function () {
        
        $(this).width(((100 / $(".active").length) - 0.2) + "%");
        
    });
    
}

function displayResult () {
    
    $("#outputResult").html(
        $("#htmlText").val() + 
        "<style>" + $("#cssText").val() + "</style>" + 
        "<script type='text/javascript'>" + $("#javascriptText").val() + "</script>"
    );
    
}

$(window).resize( function () {
    
    if($("body").width() < "500"){

    $("h3").hide();

    $(".contentPanel").each(function () {

        $(this).width(((100 / $(".active").length) - 0.6) + "%");

    })
    } else {
        
        $("h3").show();
        
    }
    
});

$("textarea").on("change keyup paste", function (){
    
    displayResult();
    
});

$.ajax("html.txt").done(function (data) {

    $("#htmlText").html(data);

}).fail(function () {

});

firstLoad();
displayResult();