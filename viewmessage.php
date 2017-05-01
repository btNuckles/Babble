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
</head>

<body>
    <?php include_once('header.php'); ?>
    <!-- VIEW MESSAGE FORM -->

          <div id="message-box" class="container" style="padding-top:70px">
              <h1><center>Search Users for Chat History</center></h1>
                <b class="input-boxes"><input class="form-control" id="recipient-name" type="text" name="recipient-name" Placeholder="User Name"></b>
                <p id="hidden-recipient-empty-error" style="color:red; display:none">* The recipient field must be filled out.</p>
                <p id="hidden-wrong-username-error" style="color:red; display:none">* User not found.</p><br>
                <button id="search-button" class="btn btn-primary" data-button="search-submit" type="button" name="search-button" style="float:right">Search User</button>
            </div>
    <!-- END VIEW MESSAGE FORM -->

    <div class="the-return">
    </div>
    <hr>
    <div class="row">
    <div class="col-sm-2 col-sm-push-5">
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="sendmessage.php"><center>Send Message</center></a></li>
    </ul>
    </div>
    </div>
    <br>


    
    <script src="scripts/viewmessage.js" charset="utf-8"></script>

    

    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>

</body>

</html>
