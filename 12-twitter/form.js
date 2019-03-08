$(document).ready(function(){
    $("#loginForm").submit(function (event) {
        
        $.ajax({
            type: "POST",
            url: "actions.php?action=login",
            data: "email=" + $("#loginEmail").val() + "&password=" + $("#loginPassword").val(),
            success: function(result) {
                if(result != "1"){
                    $("#loginAlert").html(result).show();
                    event.preventDefault();
                } 
            }

        });

        return true;

    });

    $("#signupForm").submit(function (event) {

        $.ajax({
            type: "POST",
            url: "actions.php?action=signup",
            data: "email=" + $("#signupEmail").val() + "&password=" + $("#signupPassword").val(),
            success: function(result) {
                if(result != "1"){
                    $("#signupAlert").html(result).show();
                    event.preventDefault();
                }
            }

        });

    });
});