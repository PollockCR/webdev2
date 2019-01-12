$.ajax("info.txt").done(function (data) {
    
    $("p").html(data);
    
}).fail(function () {
    
    alert("Error: Could not get data.");
    
});