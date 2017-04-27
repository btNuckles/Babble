<?php session_start();
$_SESSION["t_id"] = $_GET["id"];
?>
<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>ForumName</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/indexstyles.css">
    <link rel="stylesheet" href="stylesheets/colors.css">
    <link rel-"stylesheet" href="stylesheets/postbox.css">
</head>

<body>
    <?php include_once('header.php'); ?>

    <!-- SCRIPT TO LOAD LATEST POSTS -->
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

            xmlhttp.open("GET", "php/topic.php?id=" + " <?php echo $_GET["id"] ?> ", true);
            xmlhttp.send();
        }
		reloading();
        setInterval(function() {
            reloading();
        }, 1000);
    </script>
    <!-- END SCRIPT TO LOAD LATEST POSTS -->

    <!-- DISPLAY RECENT POSTS -->
    <div class="center-div">
      <div id="loaddiv" class="container" style="padding-top:70px" overflow:auto>
        <?php if (isset($_SESSION['userlogin'])) { ?>
            <!-- FORM FOR NEW POST -->
                <div id="reply-box" class="container" style="padding-top:70px">
                    <label for="comment-box">Comment</label>
                    <b class="input-boxes"><textarea input id="comment-box" class="form-control" type="text" name="content"></textarea></b>
                    <p></p>
                    <button id="reply-button" data-button="reply-submit" class="btn btn-primary" name="reply-button">Reply</button>
                </div>
            <!-- END FORM FOR NEW POST -->
        <?php } ?>
          <table id="post-table" class="table table-hover"></table>
      </div>
    </div>
    <!-- END DISPLAY RECENT POSTS -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <?php if (isset($_SESSION['userlogin'])) { ?>
        <script src="scripts/topic.js" charset="utf-8"></script>
    <?php } ?>

    <script src="scripts/index.js" charset="utf-8"></script>
    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>


</body>

</html>
