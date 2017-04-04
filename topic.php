<?php session_start(); ?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>ForumName</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/indexstyles.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <!-- SCRIPT TO LOAD LATEST POSTS -->
    <script>
        function reloading() {
            //code to extract POST from gettopic.php
            var queryDict = {};
            location.search.substr(1).split("&").forEach(function(item) {
                queryDict[item.split("=")[0]] = item.split("=")[1]
            });

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

            // POST to topic.php?
            xmlhttp.open("GET", "php/topic.php?id=", true);
            xmlhttp.send(queryDict);
        }

        setInterval(function() {
            reloading();
        }, 1000);
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <!-- <script src="scripts/topic.js" charset="utf-8"></script> -->

    </script>
    <!-- SCRIPT TO LOAD LATEST POSTS -->

    <!-- DISPLAY RECENT POSTS -->
    <center>
      <div id="loaddiv" class="container">
          <table id="post-table" class="table table-hover"></table>
      </div>
    </center>
    <!-- DISPLAY RECENT POSTS -->

    <!-- FORM FOR NEW POST -->
    <center>
        <div class="container">
            <div class="container">
                <label for="comment-box">Content</label>
                <b class="input-boxes"><textarea input class="form-control" id="comment-box" type="text" name="content"></textarea></b>
                <p></p>
                <button id="sub-button" data-button="submit" class="btn btn-primary" type="button" name="button">Reply</button>
            </div>
        </div>
    </center>
    <!-- END FORM FOR NEW POST -->

    <script src="scripts/index.js" charset="utf-8"></script>
    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>

</body>

</html>
