function isEmail(email) {
    
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    return regex.test(email);
    
}

function isMissing() {
    
    var fieldsMissing = "";
    
    if ($("#email").val() === "") {
        
        fieldsMissing += "<br> - Email";
        
    }
    
    if ($("#phone").val() === "") {
        
        fieldsMissing += "<br> - Telephone";
        
    }
    
    if ($("#password").val() === "") {
        
        fieldsMissing += "<br> - Password";
        
    }
    
    if ($("#passwordConfirm").val() === "") {
        
        fieldsMissing += "<br> - Password Confirm";
        
    }
    
    return fieldsMissing;
    
}

$("#submitButton").click(function () {
    
    var errorMsg = "";
    var fieldsMissing = isMissing();
    
    if (isEmail($("#email").val()) === false) {
        
        errorMsg += "Error - invalid email address<br>";
        
    }
    
    if ($.isNumeric($("#phone").val()) === false) {
        
        errorMsg += "Error - invalid phone number<br>";
    }
    
    if ($("#password").val() !== $("#passwordConfirm").val()) {
        
        errorMsg += "Error - passwords do not match<br>";
        
    }
    
    if (fieldsMissing != "") {
        
        errorMsg += "Error - the following field(s) are missing:" + fieldsMissing;
        
    }
    
    if (errorMsg != "") {
        
        $("#target").submit(function( event ) {
            
            event.preventDefault();
            $("#formFeedback").html(errorMsg);
            
        });
        
    } else {
        
        alert("Submission successful. You can now log in.");
        
    }
    
})