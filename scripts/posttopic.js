var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var TITLE_SELECTOR = 'title';
var CONTENT_SELECTOR = 'content';

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
        var title = $(document.getElementsByClassName(TITLE_SELECTOR)).val();
        var content = $(document.getElementsByClassName(CONTENT_SELECTOR)).val();

        consoleLog("New Thread Created");

        $.ajax(
          {
            url: "php/posttopic.php",
            type: "POST",
            data: {
                titleEntered: title,
                contentEntered: content
            },
            success: function(result) {
              consoleLog("Inside success function.");
              consoleLog(result);
              window.location.href = 'index.html';
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
