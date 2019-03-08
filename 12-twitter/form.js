$(document).ready(function(){
    $("#loginForm").submit(function (event) {
        
        event.preventDefault();
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=login",
            data: "email=" + $("#loginEmail").val() + "&password=" + $("#loginPassword").val(),
            success: function(result) {
                if(result != "1"){
                    $("#loginAlert").html(result).show();
                } else {
                    window.location.assign("http://catherinepollock.com/12-twitter/");
                }
            }

        });

        return true;

    });

    $("#signupForm").submit(function (event) {
        
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "actions.php?action=signup",
            data: "email=" + $("#signupEmail").val() + "&password=" + $("#signupPassword").val(),
            success: function(result) {
                if(result != "1"){
                    $("#signupAlert").html(result).show();
                } else {
                    window.location.assign("http://catherinepollock.com/12-twitter/");
                }
            }

        });
        
        return true;

    });
});