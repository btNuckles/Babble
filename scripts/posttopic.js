var NEW_POST_SUBMIT_BUTTON_SELECTOR = '[data-button="post-submit"]';
var TITLE_SELECTOR = 'post-title';
var CONTENT_SELECTOR = 'post-content';
var MEDIA_SELECTOR = 'post-media';

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
        var title = document.getElementById(TITLE_SELECTOR).value;
        var content = document.getElementById(CONTENT_SELECTOR).value;
        var media = document.getElementById(MEDIA_SELECTOR).value;

        if ((title.length > 0 && title.length <= 64) && content.length >= 1) {
            consoleLog("New Thread Created");
            consoleLog(title);
            consoleLog(content);
            consoleLog(media);
            $.ajax({
                url: "php/posttopic.php",
                type: "POST",
                data: {
                    titleEntered: title,
                    contentEntered: content,
                    mediaLink: media
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
        } else
            alert("Invalid post creation. Please make sure the title length is 64 characters or less and there is content in the post.");
    })
};

createButtonEvent();
consoleLog("Event created");
