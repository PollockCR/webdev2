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
        
        $(this).width(((100 / $(".active").length)) + "%");
        
    })
    
}

firstLoad();
