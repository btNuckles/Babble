var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var EMAIL_SELECTOR = 'email';
var USERNAME_SELECTOR = 'username';
var PASSWORD_SELECTOR = 'password';
var PASSWORD_CONFIRMATION = 'password-confirmation';

function consoleLog(someMessage) {
    console.log(someMessage);
}

/*
window.onload = function() {
    if (window.jQuery) {
        // jQuery is loaded
        alert("Yeah!");
    } else {
        // jQuery is not loaded
        alert("Doesn't Work");
    }
}
*/

function getSubmitButton() {
    var button = document.querySelector(SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent() {
    var button = getSubmitButton();
    $(button).click(function() {
        var username = $(document.getElementsByClassName(USERNAME_SELECTOR)).val();
        var email = $(document.getElementsByClassName(EMAIL_SELECTOR)).val();
        var password = $(document.getElementsByClassName(PASSWORD_SELECTOR)).val();
        var passwordConfirmation = $(document.getElementsByClassName(PASSWORD_CONFIRMATION)).val();

        if (password == passwordConfirmation) {
            $.ajax({
                url: "php/register.php",
                type: "POST",
                data: {
                    emailEntered: email,
                    usernameEntered: username,
                    passwordEntered: password
                },
                success: function(result) {
                    consoleLog("Inside success function.");
                    consoleLog(result);
                },
                error: function() {
                    consoleLog("Did not execute php scripts");
                }
            })
        } else {
            alert("Passwords do not match.")
            return;
        }
    });
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    consoleLog("Event created");
}



createButtonEvent();
