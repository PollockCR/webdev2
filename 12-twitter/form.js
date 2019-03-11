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

        var id = $(this).attr("data-userId");

        $.ajax({
            type: "POST",
            url: "actions.php?action=toggleFollow",
            data: "userId=" + id,
            success: function(result) {
                if(result == "0"){
                    // follow successful, change to unfollow
                    $('a[data-userId="' + id + '"]').html("Unfollow");
                } else if (result == "1"){
                    // unfollow successful, change to follow
                    $('a[data-userId="' + id + '"]').html("Follow");
                }
            }

        });

    });

    $("#postTweetForm").submit(function (event){
        
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: "actions.php?action=postTweet",
            data: "newTweet=" + $("#newTweet").val(),
            success: function(result) {

                if(result == "1"){
                    
                    $("#newTweet").val("");
                    $("#tweetSuccess").html("Your tweet was posted successfully").show();
                    $("#tweetFail").html("").hide();  
                    var theseTweets = window.location.href.toString() + " #tweets";
                    $("#tweets").load( theseTweets );
                    
                } else {

                    $("#tweetSuccess").html("").hide();
                    $("#tweetFail").html(result).show();                    

                }

            }

        });

    });
});