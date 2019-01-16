$("#draggable").draggable({ containment: "parent" });

$("#resizeable").resizable({
    resize: function( event, ui ) {
        if($("#resizeable").width() > 600){
            alert("big enough");
        }
    }
});