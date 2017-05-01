<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-control" content="no-cache">
    <title>Registration</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/register.css">
    <link rel="stylesheet" href="stylesheets/colors.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <div class="register-container" style="padding-top:70px">
        <div class="register-box">
          <h1>Create Your Account</h1>
            <p class="input-boxes"><input class="form-control" id="email" type="text" name="email" placeholder="Email Address"></p>
            <p id="hidden-email-error">Email address is not valid.</p>
            <p id="hidden-email-empty-error" style="color:red; display:none">* The email field must be filled out.</p>
            <p class="input-boxes"><input class="form-control" id="register-username" type="text" name="reg-username" placeholder="Username"></p>
            <p id="hidden-username-error" style="color:red; display:none">Username is too short (Must be at least 4 characters).</p>
            <p id="hidden-username-empty-error" style="color:red; display:none">* The username field must be filled out.</p>
            <p class="input-boxes"><input class="form-control" id="register-password" type="password" name="reg-password" placeholder="Password"></p>
            <p id="hidden-password-empty-error" style="color:red; display:none">* The password field must be filled out.</p>
            <p class="input-boxes"><input class="form-control" id="password-confirmation" type="password" name="reg-password2" placeholder="Confirm Password"></p>
            <p id="hidden-password-error" style="color:red; display:none">Passwords do not match.</p>
            <p id="hidden-password-error2" style="color:red; display:none">Password is too short (Must be at least 6 characters).</p>
            <button id="sub-button" class="btn btn-primary" data-button="reg-submit" type="button" name="reg-button">Submit</button>
        </div>
    </div>
    
    <script src="scripts/register.js" charset="utf-8"></script>
</body>

</html>
