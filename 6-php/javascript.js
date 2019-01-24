function isMissing() {

    var fieldsMissing = "";

    if ($("#email").val() === "") {

        fieldsMissing += "<br>An email address is required.";

    }

    if ($("#subject").val() === "") {

        fieldsMissing += "<br>The subject field is required.";

    }

    if ($("#content").val() === "") {

        fieldsMissing += "<br>The content field is required.";

    }

    return fieldsMissing;

}

$("#target").submit(function( event ) {

    var errorMsg = "";
    $("#error").html("");
    $("#success").html("");
    errorMsg = isMissing();

    if (errorMsg != "") {

        event.preventDefault();

        errorMsg = '<div class="alert alert-danger" role="alert"><strong>There are error(s) in your form:</strong>' + errorMsg + '</div>';

        $("#error").html(errorMsg);

    } else {

        $("#target").submit();

    }

});

