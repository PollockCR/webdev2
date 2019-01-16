$("#littleBox").draggable();
$("#bigBox").droppable({
    drop: function( event, ui ) {
        alert("Good job!");
    }
});