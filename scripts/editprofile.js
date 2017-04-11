var EDIT_SUBMIT_BUTTON_SELECTOR = '[data-button="edit-submit"]';
var USERNAME_SELECTOR = 'newusername';
var KARMA_SELECTOR = 'bio';

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
        var bio = document.getElementById("bio").value;
        consoleLog(newusername);
        if (newusername.length == 0) {
            newusername = "null entry";
        }
        if (bio.length == 0) {
            bio = "null entry";
        }
        if (newusername.length < 4) {
            alert("New username length too short. 4+ characters.");
        } else {
            $.ajax({
                url: "php/editprofile.php",
                type: "POST",
                data: {
                    newusernameEntered: newusername,
                    bioEntered: bio
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
