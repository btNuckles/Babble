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
    <link rel="stylesheet" href="stylesheets/postbox.css">
    <link rel="stylesheet" href="stylesheets/icons.css" type="text/css">
</head>

<body>
    <?php include_once('header.php'); ?>
    <!-- SEARCH USER PROFILE FORM -->
    <div class="center-div">
      <div id="loaddiv" class="container" style="padding-top:70px;" overflow: auto>
          <div id="search-box" class="container" style="padding-top:70px">

                <h1>Search Users</h1>
                <b class="input-boxes"><input class="form-control" id="searchusername" placeholder="Username" type="text" name="searchusername" style="display:block;float:left;height:32px;width:300px"></b>
                <button id="sub-button" class="btn btn-primary" data-button="search-submit" type="button" name="search-button" style="display:block;float:left;height:32px;width:75px;margin: 0px 0px -2px">Search</button>
                <br><hr>
                <div class="the-return"></div>
            </div>
          </div>

    </div>
    <!-- END SEARCH USER PROFILE FORM -->
    <div class="the-true-return"></div><br>

    <script src="scripts/searchuser.js" charset="utf-8"></script>



    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>

</body>

</html>
