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

    $(".toggleFollow").click(function (){
        
        $thisToggle = $(this);

        $.ajax({
            type: "POST",
            url: "actions.php?action=toggleFollow",
            data: "userId=" + $(this).attr("data-userId"),
            success: function(result) {
                if(result == "0"){
                    // follow successful, change to unfollow
                    $thisToggle.html("- Unfollow");
                } else if (result == "1"){
                    // unfollow successful, change to follow
                    $thisToggle.html("+ Follow");
                }
            }

        });

    });
});