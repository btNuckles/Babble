<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>Babble</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/indexstyles.css" type="text/css">
    <link rel-"stylesheet" href="stylesheets/postbox.css" type="text/css">
    <link rel="stylesheet" href="stylesheets/colors.css" type="text/css">
    <link rel="stylesheet" href="stylesheets/icons.css" type="text/css">
</head>

<body>
    <?php include_once('header.php'); ?>
    <!-- SCRIPT TO LOAD LATEST TOPICS -->
    <script>
        function reloading() {

            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }

            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("post-table").innerHTML = this.responseText;
                }
            };

            xmlhttp.open("GET", "php/gettopic.php", true);
            xmlhttp.send();
        }
        reloading();
        setInterval(function() {
            reloading();
        }, 1000);
    </script>
    <!-- SCRIPT TO LOAD LATEST TOPICS -->


    <div class="center-div">
        <div id="loaddiv" class="container" style="padding-top:25px" overflow: auto>
          <!-- CREATE NEW TOPIC -->
          <a href="posttopic.php">
              <?php if (isset($_SESSION['userlogin'])) { ?>
              <input type="button" id="new-topic" value="Create New Topic" class="btn btn-primary" />
              <?php } ?>
          </a>
          <!-- DISPLAY RECENT TOPICS -->
          <h1>Recent Topics</h1>
            <div id="post-table" class="table table-hover"></div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="scripts/index.js" charset="utf-8"></script>

</body>

<?php if(isset($_SESSION['userlogin'])) {
    echo "<script> checkForSession(); </script>";
 } ?>

</html>
