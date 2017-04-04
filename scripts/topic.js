var NEW_SUBMIT_REPLY_BUTTON_SELECTOR = '[data-button="reply-submit"]';
var CONTENT_SELECTOR = 'Comment';

function consoleLog(someMessage)
{ console.log(someMessage); }

function getNewSubmitReplyButton()
{
    var button = document.querySelector(NEW_SUBMIT_REPLY_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function createButtonEvent()
{
    var button = getNewSubmitReplyButton();
    button.addEventListener('click', function() {
        consoleLog("Reply was Clicked");
    });
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var content = document.getElementById("comment-box").value;
        consoleLog("New Post Created");
        consoleLog(content);
        $.ajax({
            url: "php/reply.php",
            type: "POST",
            data: {
                contentEntered: content
            },
            success: function(result) {
              consoleLog("Inside success function.");
              consoleLog(result);
            },
            error: function() {
              consoleLog("Did not execute php scripts");
            }
          })
      })
};

createButtonEvent();
consoleLog("Event created");
