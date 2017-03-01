var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var USERNAME_SELECTOR = 'username';
var PASSWORD_SELECTOR = 'password';

function consoleLog(someMessage) {
    console.log(someMessage);
}

function getSubmitButton() {
    var button = document.querySelector(SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent() {
    var button = getSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        consoleLog('Right before AJAX');
        var username = $(document.getElementsByClassName(USERNAME_SELECTOR)).val();
        var password = $(document.getElementsByClassName(PASSWORD_SELECTOR)).val();
        $.ajax({
            url: "php/login.php",
            type: "POST",
            data: {
                usernameEntered: username,
                passwordEntered: password
            },
            success: function(result) {
                consoleLog(result);
            },
            error: function() {
                consoleLog("Did not execute php scripts");
            }
        })
    })
};

createButtonEvent();
consoleLog('Event created');
