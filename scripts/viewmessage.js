var SEARCH_SUBMIT_BUTTON_SELECTOR = '[data-button="search-submit"]';
var RECIPIENT_NAME_SELECTOR = 'recipient-name';
var EMPTY_RECIPIENT_ERROR = 'hidden-recipient-empty-error';
var WRONG_USERNAME_ERROR ='hidden-wrong-username-error';

function consoleLog(someMessage) { console.log(someMessage); }

function getEmptyRecipientErrorMsg() {
    var msg = document.getElementById(EMPTY_RECIPIENT_ERROR);
    return msg;
}

function showEmptyRecipientError() {
    var msg = getEmptyRecipientErrorMsg();
    msg.style.display = 'block';
}

function hideEmptyRecipientError() {
  var msg = getEmptyRecipientErrorMsg();
  msg.style.display = 'none';
}

function getWrongUsernameErrorMsg() {
    var msg = document.getElementById(WRONG_USERNAME_ERROR);
    return msg;
}

function showWrongUsernameError() {
    var msg = getWrongUsernameErrorMsg();
    msg.style.display = 'block';
}

function hideWrongUsernameError() {
    var msg = getWrongUsernameErrorMsg();
    msg.style.display = 'none';
}

function getSearchSubmitButton() {
    var button = document.querySelector(SEARCH_SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent() {
    var button = getSearchSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        hideWrongUsernameError();
        consoleLog("Right before AJAX");
        var recipient = document.getElementById("recipient-name").value;
        if (recipient.length == 0) {
            showEmptyRecipientError();
            var RecipientLengthFlag = false;
        } else {
            hideEmptyRecipientError();
            var RecipientLengthFlag = true;
        }
        if (RecipientLengthFlag) {
            $.ajax({
                url: "php/viewmessage.php",
                type: "POST",
                data: {
                    recipientEntered: recipient,
                },
                success: function(result) {
                    consoleLog("Inside success function.");
                    consoleLog(result);
                    if (result == 'user does not exist') {
                        showWrongUsernameError();
                    } else {
                        consoleLog(result);
                        $(".the-return").html(result);
                        consoleLog(result);
                        //window.location.href = 'viewprofile.php';
                        //setTimeout ("window.location='index.php'", 1000);
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
    })
};

createButtonEvent();
consoleLog("Event created");
