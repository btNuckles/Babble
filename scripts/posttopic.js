var NEW_POST_SUBMIT_BUTTON_SELECTOR = '[data-button="post-submit"]';
var TITLE_SELECTOR = 'title';
var CONTENT_SELECTOR = 'content';

function consoleLog(someMessage)
{ console.log(someMessage); }

function getNewPostSubmitButton()
{
    var button = document.querySelector(NEW_POST_SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent()
{
    var button = getNewPostSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var title = document.getElementById("post-title").value;
        var content = document.getElementById("post-content").value;
        consoleLog("New Thread Created");
        consoleLog(title);
        consoleLog(content);
        $.ajax({
            url: "php/posttopic.php",
            type: "POST",
            data: {
                titleEntered: title,
                contentEntered: content
            },
            success: function(result) {
              consoleLog("Inside success function.");
              consoleLog(result);
              window.location.href = 'index.php';
            },
            error: function() {
              consoleLog("Did not execute php scripts");
            }
          })
      })
};

createButtonEvent();
consoleLog("Event created");
