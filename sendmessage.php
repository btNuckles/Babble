<?php session_start();
if(!isset($_SESSION['userlogin'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>ForumName</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/editprofile.css">
    <link rel="stylesheet" href="stylesheets/indexstyles.css">
    <link rel="stylesheet" href="stylesheets/colors.css">
    <link rel="stylesheet" href="stylesheets/icons.css" type="text/css">
</head>

<body>
    <?php include_once('header.php'); ?>
    <!-- SEND MESSAGE FORM -->
    <div class="row" style="padding-top:70px">
        <div class="col-sm-2 col-sm-push-5">
            <ul class="nav nav-pills nav-stacked">
                <li class="active"><a href="viewmessage.php"><center>View Messages</center></a></li>
            </ul>
        </div>
    </div>
    <hr>

    <div id="message-box" class="container">
        <h1><center>Send a Message</center></h1>
        <label id="recipient-name-label" for="recipient-name">Send to:</label>
        <b class="input-boxes"><input class="form-control" id="recipient-name" type="text" name="recipient-name" Placeholder="Recipient Name"></b><p></p>
        <p id="hidden-recipient-empty-error" style="color:red; display:none">* The recipient field must be filled out.</p>
        <p id="hidden-wrong-username-error" style="color:red; display:none">* User not found.</p>
        <label id="bio-label" for="bio">Message:</label>
        <b class="input-boxes"><textarea input class="form-control" id="sent-message" type="text" name="sent-message" Placeholder="Enter your message"></textarea></b><p></p>
        <p id="hidden-message-empty-error" style="color:red; display:none">* The message field must be filled out.</p>
        <button id="sub-button" class="btn btn-primary" data-button="message-submit" type="button" name="message-button">Send Message</button>
    </div>
    <br>
    <!-- END SEND MESSAGE FORM -->


    <script src="scripts/sendmessage.js" charset="utf-8"></script>



    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>

</body>

</html>
