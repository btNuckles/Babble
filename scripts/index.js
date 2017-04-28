var SUBMIT_BUTTON_SELECTOR = '[data-button="submit"]';
var VIEW_PROFILE_SELECTOR = 'view-profile';
var EDIT_PROFILE_SELECTOR = 'edit-profile';
var USERNAME_SELECTOR = 'username';
var PASSWORD_SELECTOR = 'password';
var LOGIN_BOX_SELECTOR = 'login-box';
var LOGIN_BUTTON_SELECTOR = 'login-button';
var REGISTER_LINK_SELECTOR = 'register-link';
var LOGOUT_BUTTON_SELECTOR = 'logout-button';
var CREATE_THREAD_BUTTON_SELECTOR = 'new-topic';

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

function getViewProfileLink() {
    var viewLink = document.getElementById(VIEW_PROFILE_SELECTOR);
    return viewLink;
}

function getEditProfileLink() {
    var editLink = document.getElementById(EDIT_PROFILE_SELECTOR);
    return editLink;
}

function getLogoutButton() {
    var button = document.getElementById(LOGOUT_BUTTON_SELECTOR);
    return button;
}

function getLoginButton() {
    var button = document.getElementById(LOGIN_BUTTON_SELECTOR);
    return button;
}

function getCreateThreadButton() {
    var button = document.getElementById(CREATE_THREAD_BUTTON_SELECTOR);
    return button;
}

function hideLoginOptions() {
    console.log("hiding login options");
    var viewLink = getViewProfileLink();
    var editLink = getEditProfileLink();
    var regLink = getRegisterLink();
    var loginBox = getLoginBox();
    var button = getLogoutButton();
    var button2 = getLoginButton();
    viewLink.style.display = 'block';
    editLink.style.display = 'block';
    regLink.style.display = 'none';
    loginBox.style.display = 'none';
    button.style.display = 'block';
    button2.style.display = 'none';
}

function showLoginOptions() {
    console.log("Showing login options");
    var viewLink = getViewProfileLink();
    var editLink = getEditProfileLink();
    var regLink = getRegisterLink();
    var loginBox = getLoginBox();
    var button = getLogoutButton();
    var button2 = getLoginButton();
    viewLink.style.display = 'none';
    editLink.style.display = 'none';
    regLink.style.display = 'block';
    loginBox.style.display = 'block';
    button.style.display = 'none';
    button2.style.display = 'block';
}

function checkForSession() {
    console.log("Check for Session Function");
    $.ajax({
        url: "php/sessionCheck.php",
        type: "GET",
        success: function(result) {
            console.log("Second ajax function");
            console.log("result is", result);

            //Login options via JS have been deprecated
            /*if (result == "true") {
              hideLoginOptions();
            }
            else {
              showLoginOptions();
            }*/

        }
    })
}

function createLoginButtonEvent() {
    var button = getLoginButton();
    button.addEventListener('click', function() {
        consoleLog("Submit was Clicked");
    });
    $(button).click(function() {
        consoleLog('Right before AJAX');
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        $.ajax({
            url: "php/login.php",
            type: "POST",
            data: {
                usernameEntered: username,
                passwordEntered: password
            },
            success: function(result) {
                consoleLog(result);
                if (result == "failed login.") {
                    alert("Invalid login information.");
                    checkForSession();
                    location.reload();
                } else {
                    var printname = $('username').text();
                    alert("Successful login! Hello, " + username + ".");
                    checkForSession();
                    location.reload();
                }

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
                location.reload();
            },
            error: function() {
                consoleLog("Did not execute php scripts");
            }
        })
    })
};

if (getLoginButton() != null) {
    createLoginButtonEvent();
} else if (getLogoutButton() != null) {
    createLogoutButtonEvent();
}
consoleLog('Event created');