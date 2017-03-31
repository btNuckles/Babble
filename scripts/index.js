var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var USERNAME_SELECTOR = 'username';
var PASSWORD_SELECTOR = 'password';
var LOGIN_BOX_SELECTOR = 'login-box';
var LOGIN_BUTTON_SELECTOR = 'login-button';
var REGISTER_LINK_SELECTOR = 'register-link';
var LOGOUT_BUTTON_SELECTOR = 'logout-button';

function consoleLog(someMessage) {
    console.log(someMessage);
}

function getSubmitButton() {
    var button = document.querySelector(SUBMIT_BUTTON_SELECTOR);
    consoleLog("buttonAssigned");
    return button;
}

function getLoginBox() {
    var box = document.getElementById(LOGIN_BOX_SELECTOR);
    return box;
}

function getRegisterLink() {
    var regLink = document.getElementById(REGISTER_LINK_SELECTOR);
    return regLink;
}

function getLogoutButton() {
  var button = document.getElementById(LOGOUT_BUTTON_SELECTOR);
  return button;
}

function getLoginButton() {
  var button = document.getElementById(LOGIN_BUTTON_SELECTOR);
  return button;
}

function hideLoginOptions() {
  console.log("hiding login options");
  var regLink = getRegisterLink();
  var loginBox = getLoginBox();
  var button = getLogoutButton();
  var button2 = getLoginButton();
  regLink.style.display = 'none';
  loginBox.style.display = 'none';
  button.style.display = 'block';
  button2.style.display = 'none';
}

function showLoginOptions() {
  console.log("Showing login options");
  var regLink = getRegisterLink();
  var loginBox = getLoginBox();
  var button = getLogoutButton();
  regLink.style.display = 'block';
  loginBox.style.display = 'block';
  button.style.display = 'none';
}

function checkForSession() {
  console.log("Check for Session Function");
  $.ajax({
    url: "php/sessionCheck.php",
    type: "GET",
    success: function(result) {
      console.log("Second ajax function");
      console.log(result);
      if (result == "true") {
        hideLoginOptions();
      }
      else {
        showLoginOptions();
      }
    }
  })
}

function createSubmitButtonEvent() {
    var button = getSubmitButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        consoleLog('Right before AJAX');
        var username = $(document.getElementsByClassName(USERNAME_SELECTOR)).val();
        var password = $(document.getElementsByClassName(PASSWORD_SELECTOR)).val();
        $.ajax({
            url: "php/login.php",
            type: "POST",
            data: {
                usernameEntered: username,
                passwordEntered: password
            },
            success: function(result) {
                consoleLog(result);
                checkForSession();
            },
            error: function() {
                consoleLog("Did not execute php scripts");
            }
        })
    })
};

function createLogoutButtonEvent() {
    var button = getLogoutButton();
    button.addEventListener('click', function() {
        consoleLog("Logout was Clicked");
    });
    $(button).click(function() {
        consoleLog('Right before AJAX');
        $.ajax({
            url: "php/logout.php",
            type: "GET",
            success: function(result) {
                consoleLog(result);
                checkForSession();
            },
            error: function() {
                consoleLog("Did not execute php scripts");
            }
        })
    })
};

createSubmitButtonEvent();
createLogoutButtonEvent();
consoleLog('Event created');
