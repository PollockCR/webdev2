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

$("#signupForm").submit(function (event) {
    
    event.preventDefault();
    
    $.ajax({
        type: "POST",
        url: "actions.php?action=signup",
        data: "email=" + $("#signupEmail").val() + "&password=" + $("#signupPassword").val(),
        success: function(result) {
            alert(result)
        }
        
    })
    
})
