var REG_SUBMIT_BUTTON_SELECTOR = '[data-button="reg-submit"]';
var EMAIL_SELECTOR = 'email';
var USERNAME_SELECTOR = 'reg-username';
var PASSWORD_SELECTOR = 'reg-password';
var PASSWORD_CONFIRMATION = 'password-confirmation';
var USERNAME_ERROR = 'hidden-username-error';
var PASSWORD_ERROR = 'hidden-password-error';
var PASSWORD_ERROR2 = 'hidden-password-error2';
var EMAIL_ERROR = 'hidden-email-error';
var EMPTY_EMAIL_ERROR = 'hidden-email-empty-error';
var EMPTY_USERNAME_ERROR = 'hidden-username-empty-error';
var EMPTY_PASSWORD_ERROR = 'hidden-password-empty-error';

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

function getRegSubmitButton() {
    var button = document.querySelector(REG_SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function getUsernameErrorMsg() {
    var msg = document.getElementById(USERNAME_ERROR);
    return msg;
}

function showUsernameError() {
    msg = getUsernameErrorMsg();
    msg.style.display = 'block';
}

function hideUsernameError() {
  msg = getUsernameErrorMsg();
  msg.style.display = 'none';
}

function getPasswordErrorMsg() {
    var msg = document.getElementById(PASSWORD_ERROR);
    return msg;
}

function showPasswordError() {
    msg = getPasswordErrorMsg();
    msg.style.display = 'block';
}

function hidePasswordError() {
  msg = getPasswordErrorMsg();
  msg.style.display = 'none';
}

function getPasswordErrorMsg2() {
    var msg = document.getElementById(PASSWORD_ERROR2);
    return msg;
}

function showPasswordError2() {
    msg = getPasswordErrorMsg2();
    msg.style.display = 'block';
}

function hidePasswordError2() {
    msg = getPasswordErrorMsg2();
    msg.style.display = 'none';
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

//EMPTY ERRORS
function getEmptyEmailErrorMsg() {
    var msg = document.getElementById(EMPTY_EMAIL_ERROR);
    return msg;
}

function showEmptyEmailError() {
    var msg = getEmptyEmailErrorMsg();
    msg.style.display = 'block';
}

function hideEmptyEmailError() {
  var msg = getEmptyEmailErrorMsg();
  msg.style.display = 'none';
}

function getEmptyUsernameErrorMsg() {
    var msg = document.getElementById(EMPTY_USERNAME_ERROR);
    return msg;
}

function showEmptyUsernameError() {
    var msg = getEmptyUsernameErrorMsg();
    msg.style.display = 'block';
}

function hideEmptyUsernameError() {
  var msg = getEmptyUsernameErrorMsg();
  msg.style.display = 'none';
}

function getEmptyPasswordErrorMsg() {
    var msg = document.getElementById(EMPTY_PASSWORD_ERROR);
    return msg;
}

function showEmptyPasswordError() {
    var msg = getEmptyPasswordErrorMsg();
    msg.style.display = 'block';
}

function hideEmptyPasswordError() {
  var msg = getEmptyPasswordErrorMsg();
  msg.style.display = 'none';
}


function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function createButtonEvent() {
    var button = getRegSubmitButton();
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var reg_username = document.getElementById("register-username").value;
        var reg_email = document.getElementById("email").value;
        var reg_password = document.getElementById("register-password").value;
        var reg_passwordConfirmation = document.getElementById("password-confirmation").value;
        consoleLog(reg_password.length);
        if (validateEmail(reg_email) === true) {
            hideEmailError();
            if (reg_password == reg_passwordConfirmation) {
                hidePasswordError();
                consoleLog("Passwords Match");
                var PassMatchFlag = true;
            } else {
                showPasswordError();
                var PassMatchFlag = false;
            }
            if (reg_password.length >= 6) {
                hidePasswordError2();
                hideEmptyPasswordError();
                consoleLog("Passwords Length is Good");
                var PassLengthFlag = true;
            } else if (reg_password.length == 0) {
                showEmptyPasswordError();
                hidePasswordError2();
                var PassLengthFlag = false;
            } else {
                showPasswordError2();
                hideEmptyPasswordError();
                var PassLengthFlag = false;
            }
            if (reg_username.length >= 4) {
                hideUsernameError();
                hideEmptyUsernameError();
                consoleLog("Username Length is Good");
                var UserLengthFlag = true;
            } else if (reg_username.length == 0) {
                showEmptyUsernameError();
                hideUsernameError();
                var UserLengthFlag = false;
            } else {
                showUsernameError();
                hideEmptyUsernameError();
                var UserLengthFlag = false;
            }
            if (PassMatchFlag && PassLengthFlag && UserLengthFlag) {
                $.ajax({
                    url: "php/register.php",
                    type: "POST",
                    data: {
                        regEmailEntered: reg_email,
                        regUsernameEntered: reg_username,
                        regPasswordEntered: reg_password
                    },
                    success: function(result) {
                        consoleLog("Inside success function.");
                        consoleLog(result);
                        if (result == 'user exists') {
                            alert("Username taken.");
                            setTimeout ("window.location='register.php'", 1000);
                        } else {
                            alert("Your account has been created. Please login.");
                            setTimeout ("window.location='index.php'", 1000);
                        }

                    },
                    error: function() {
                        consoleLog("Did not execute php scripts");
                    }
                })
            } else {
                consoleLog("False flag detected.");
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
