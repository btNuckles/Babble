var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var EMAIL_SELECTOR = 'email';
var USERNAME_SELECTOR = 'username';
var PASSWORD_SELECTOR = 'password';
var PASSWORD_CONFIRMATION = 'password-confirmation';

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

function createButtonEvent() {
    var button = getSubmitButton();
    button.addEventListener('click', function getDBLine() {
        consoleLog("Right before AJAX");
        var username = document.getElementsByClassName(USERNAME_SELECTOR).value;
        var email = document.getElementsByClassName(EMAIL_SELECTOR).value;
        var password = document.getElementsByClassName(PASSWORD_SELECTOR).value;
        var passwordConfirmation = document.getElementsByClassName(PASSWORD_CONFIRMATION).value;

        if (password == passwordConfirmation) {
          consoleLog(password);
          consoleLog(passwordConfirmation);
            consoleLog("Passwords Match");
            $.ajax({
                url: "php/register.php",
                type: "POST",
                dataType: 'json',
                data: {
                    email: email,
                    username: username,
                    password: password
                },
                success: function(result) {
                    consoleLog(result);
                }
            })
        }
        else {
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
