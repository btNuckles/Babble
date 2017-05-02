var SEARCH_SUBMIT_BUTTON_SELECTOR = '[data-button="search-submit"]';
var USERNAME_SELECTOR = 'searchusername';

function consoleLog(someMessage) { console.log(someMessage); }

function getSearchSubmitButton() {
    var button = document.querySelector(SEARCH_SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent() {
    consoleLog("im here");
    var button = getSearchSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var searchusername = document.getElementById("searchusername").value;
        consoleLog(searchusername);
        $(".the-true-return").html("");
        $(".the-return").html("");
        if (searchusername.length == 0) {
            searchusername = "null entry";
        }
        $.ajax({
            url: "php/searchuser.php",
            type: "POST",
            data: {
                searchusernameEntered: searchusername,
            },
            success: function(result) {
                consoleLog("Inside success function.");
                consoleLog(result);
                if (result == 'user exists') {
                    $(".the-true-return").html("this worked");
                } else {
                    $(".the-return").html(result);
                }
                //window.location.href = 'viewprofile.php';
            },
            error: function() {
                consoleLog("Did not execute php scripts");
            }
        })
    })
};

createButtonEvent();
consoleLog("Event created");
