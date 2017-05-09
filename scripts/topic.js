var NEW_SUBMIT_REPLY_BUTTON_SELECTOR = '[data-button="reply-submit"]';
var LIKE_BUTTON_SELECTOR = '[data-button="like-button"]';
var DISLIKE_BUTTON_SELECTOR = '[data-button="dislike-button"]';
var CONTENT_SELECTOR = 'Comment';
// var ID_SELECTOR = '.Hidden';

function consoleLog(someMessage)
{ console.log(someMessage); }

function getNewSubmitReplyButton()
{
    var button = document.querySelector(NEW_SUBMIT_REPLY_BUTTON_SELECTOR);
    return button;
}

function getLikeButton()
{
  var button = document.querySelector(LIKE_BUTTON_SELECTOR);
  return button;
}

function getDislikeButton()
{
  var button = document.querySelector(DISLIKE_BUTTON_SELECTOR);
  return button;
}

function clearText()
{
    document.getElementById("comment-box").value="";
}

function createButtonEvent()
{
    var button = getNewSubmitReplyButton();

    $(button).click(function() {
        consoleLog("Right before AJAX");
        var content = document.getElementById("comment-box").value;
        if (content.length >= 1) {
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
            clearText();
        } else
            alert("Please enter text to reply.");

    });
};

function likeFunction(e, postnum) {
  var button = e.target;
  // var postnum = $(button).parent().siblings(ID_SELECTOR).html();
  consoleLog(postnum);
  consoleLog("This is the like function");
  $.ajax({
    url: "php/likepost.php?post_id=" + postnum,
    type: "POST",
    success: function(result) {
      consoleLog('likepost.php ran');
      consoleLog(result);
      $(button).parent().html(result);
    },
    error: function() {
      consoleLog('likepost.php did not run')
    }
});
}

function dislikeFunction(e, postnum) {
  var button = e.target;
  // var postnum = $(button).parent().siblings(ID_SELECTOR).html();
  consoleLog(postnum);
  consoleLog("this is the dislike function")
  $.ajax({
    url: "php/dislikepost.php?post_id=" + postnum,
    type: "POST",
    success: function(result) {
      consoleLog('dislikepost.php ran');
      consoleLog(result);
      $(button).parent().html(result);
    },
    error: function() {
      consoleLog('dislikepost.php did not run')
    }
  });
}

createButtonEvent();
consoleLog("Event created");
