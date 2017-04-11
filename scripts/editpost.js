var NEW_EDIT_SUBMIT_BUTTON_SELECTOR = '[data-button="edit-submit"]';
var NEW_DELETE_BUTTON_SELECTOR = '[data-button="delete-submit"]';
var CONTENT_SELECTOR = 'Edit';

function consoleLog(someMessage)
{ console.log(someMessage); }

function getNewEditSubmitButton()
{
    var button = document.querySelector(NEW_EDIT_SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function getNewDeleteButton()
{
    var button = document.querySelector(NEW_DELETE_BUTTON_SELECTOR);
    consoleLog("Delete Button Assigned");
    return button;
}

function createButtonEvent()
{
    var button = getNewEditSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit Edit was Clicked");
    });
    $(button).click(function() {
        consoleLog("Right before AJAX");
        var content = document.getElementById("commentedit-box").value;
        if (content.length >= 1) {
            consoleLog("Post Edited");
            consoleLog(content);
            $.ajax({
                url: "php/editpost.php",
                type: "POST",
                data: {
                    editEntered: content
                },
                success: function(result) {
                    consoleLog("Inside success function.");
                    consoleLog(result);
                    window.location.replace('topic.php?id=' + thread_id);
                },
                error: function() {
                    consoleLog("Did not execute php scripts");
                }
            })
        } else
            alert("Please enter text to edit.");
      })
};

function createDeleteButtonEvent()
{
    var button = getNewDeleteButton();
    button.addEventListener('click', function() {
        consoleLog("Delete was clicked");
    });
    $(button).click(function() {
        consoleLog("Right before AJAX");
        consoleLog("Deleted Post");
        $.ajax({
            url: "php/deletepost.php",
            type: "POST",
            success: function(result) {
                consoleLog("Inside success function.");
                consoleLog(result);
                window.location.replace('topic.php?id=' + thread_id);
            },
            error: function() {
                consoleLog("Did not execute php scripts");
            }
        })
    })
}

createButtonEvent();
createDeleteButtonEvent();
consoleLog("Event created");
