var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var USERNAME_SELECTOR = 'username';
var KARMA_SELECTOR = 'karma';

function consoleLog(someMessage)
{ console.log(someMessage); }

function getSubmitButton()
{
    var button = document.querySelector(SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent()
{
    var button = getSubmitButton();
    $(button).click(function()
    {
        consoleLog("Right before AJAX");
        var username = $(document.getElementsByClassName(USERNAME_SELECTOR)).val();
        var karma = $(document.getElementsByClassName(KARMA_SELECTOR)).val();

        consoleLog("New Thread Created");

        $.ajax(
          {
            url: "php/editprofile.php",
            type: "POST",
            data: {
                usernameEntered: username,
                karmaEntered: karma
            },
            success: function(result) {
              consoleLog("Inside success function.");
              consoleLog(result);
              window.location.href = 'viewprofile.html';
            },
            error: function() {
              consoleLog("Did not execute php scripts");
            }
          }
        )
      }
    );

  button.addEventListener('click', function() {consoleLog("Submit was Clicked"); });
  consoleLog("Event created");
}

createButtonEvent();
