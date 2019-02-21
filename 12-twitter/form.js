$("#loginForm").submit(function (event) {
    
    event.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "actions.php?action=login",
        data: "email=" + $("#loginEmail").val() + "&password=" + $("#loginPassword").val(),
        success: function(result) {
            alert(result)
        }
        
    })
    
})
