var EDIT_SUBMIT_BUTTON_SELECTOR = '[data-button="edit-submit"]';
var USERNAME_SELECTOR = 'newusername';
var KARMA_SELECTOR = 'karma';

function consoleLog(someMessage) { console.log(someMessage); }

function getEditSubmitButton() {
    var button = document.querySelector(EDIT_SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent() {
    var button = getEditSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var newusername = document.getElementById("newusername").value;
        var karma = document.getElementById("karma").value;
        consoleLog("New Thread Created");
        if (newusername.length < 4) {
            alert("New username length too short. 4+ characters.");
        } else {
            $.ajax({
                url: "php/editprofile.php",
                type: "POST",
                data: {
                    newusernameEntered: newusername,
                    karmaEntered: karma
                },
                success: function(result) {
                    consoleLog("Inside success function.");
                    consoleLog(result);
                    window.location.href = 'viewprofile.php';
                },
                error: function() {
                    consoleLog("Did not execute php scripts");
                }
            })
        }
    })
};

createButtonEvent();
consoleLog("Event created");