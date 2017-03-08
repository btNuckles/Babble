var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var EMAIL_SELECTOR = 'email';
var USERNAME_SELECTOR = 'username';
var PASSWORD_SELECTOR = 'password';
var PASSWORD_CONFIRMATION = 'password-confirmation';
var PASSWORD_ERROR = 'hidden-password-error';
var EMAIL_ERROR = 'hidden-email-error';

function checkPassword(password, passwordConfirmation) {
    if (password == password) {
        consoleLog("Matched.");
    } else {
        {
            return 0;
        }
    }
}

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

function getPasswordErrorMsg() {
    var msg = document.getElementById(PASSWORD_ERROR);
    return msg;
}

function showPasswordError() {
    msg = getPasswordErrorMsg();
    msg.style.display = 'block';
}

function getEmailErrorMsg() {
    var msg = document.getElementById(EMAIL_ERROR);
    return msg;
}

function showEmailError() {
    var msg = getEmailErrorMsg();
    msg.style.display = 'block';
}

function hideEmailError() {
  var msg = getEmailErrorMsg();
  msg.style.display = 'none';
}

function hidePasswordError() {
  msg = getPasswordErrorMsg();
  msg.style.display = 'none';
}

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function createButtonEvent() {
    var button = getSubmitButton();
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var username = $(document.getElementsByClassName(USERNAME_SELECTOR)).val();
        var email = $(document.getElementsByClassName(EMAIL_SELECTOR)).val();
        var password = $(document.getElementsByClassName(PASSWORD_SELECTOR)).val();
        var passwordConfirmation = $(document.getElementsByClassName(PASSWORD_CONFIRMATION)).val();

        if (validateEmail(email) === true) {
                hideEmailError();
            if (password == passwordConfirmation) {
                hidePasswordError();
                consoleLog(password);
                consoleLog(passwordConfirmation);
                consoleLog("Passwords Match");
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
                        setTimeout ("window.location='index.html'", 1000);
                    },
                    error: function() {
                        consoleLog("Did not execute php scripts");
                    }
                })
            } else {
                showPasswordError();
                return;
            }
        } else {
            showEmailError();
        }
    });
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    consoleLog("Event created");
}




createButtonEvent();
