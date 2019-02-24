$("#loginForm").submit(function (event) {

    event.preventDefault();

    $.ajax({
        type: "POST",
        url: "actions.php?action=login",
        data: "email=" + $("#loginEmail").val() + "&password=" + $("#loginPassword").val(),
        success: function(result) {
            if(result == "1"){
                window.location.assign("http://www.catherinepollock.com/12-twitter/")
            } else {
                $("#loginAlert").html(result).show()
            }
        }

    })

})

$("#signupForm").submit(function (event) {

    event.preventDefault()

    $.ajax({
        type: "POST",
        url: "actions.php?action=signup",
        data: "email=" + $("#signupEmail").val() + "&password=" + $("#signupPassword").val(),
        success: function(result) {
            if(result == "1"){
                window.location.assign("http://www.catherinepollock.com/12-twitter/")
            } else {
                $("#signupAlert").html(result).show()
            }
        }

    })

})
