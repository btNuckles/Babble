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
    <!-- EDIT USER PROFILE FORM -->

          <div id="edit-box" class="container" style="padding-top:70px">
              <h1>Edit Your Profile</h1>
                <label id="new-username-label" for="edit-username">New Display Name</label>
                <b class="input-boxes"><input class="form-control" id="newusername" type="text" name="newusername"></b><p></p>
                <label id="bio-label" for="bio">Bio</label>
                <b class="input-boxes"><textarea input class="form-control" id="bio" type="text" name="bio"></textarea></b><p></p>
                <button id="sub-button" class="btn btn-primary" data-button="edit-submit" type="button" name="edit-button">Save Changes</button>
            </div>
    <!-- END EDIT USER PROFILE FORM -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts/editprofile.js" charset="utf-8"></script>

    <script src="scripts/index.js" charset="utf-8"></script>

    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>

</body>

</html>
