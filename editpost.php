<?php session_start();
if(!isset($_SESSION['userlogin'])){
    header("Location: index.php");
}
$_SESSION["p_id"] = $_GET["postid"];
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

    <script type="text/javascript">
    var thread_id = <?php echo json_encode($_SESSION["t_id"]); ?>;
    </script>

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

        xmlhttp.open("GET", "php/viewpost.php?postid=" + " <?php echo $_GET["postid"] ?> ", true);
        xmlhttp.send();
    }
    reloading();
    </script>
    <!-- END SCRIPT TO LOAD LATEST POSTS -->

    <!-- FORM FOR EDIT POST -->

    <!-- END FORM FOR EDIT POST -->

    <!-- DISPLAY POST -->
    <div class="center-div">
      <div id="loaddiv" class="container" style="padding-top:70px" overflow: auto>
        <div id="edit-box">
            <label for="commentedit-box">Edit</label>
            <b class="input-boxes"><textarea input id="commentedit-box" class="form-control" type="text" name="content"></textarea></b>
            <p></p>
            <button id="edit-button" data-button="edit-submit" type="btn btn-primary" name="edit-button">Submit Edit</button>
            <button id="delete-button" data-button="delete-submit" type="btn btn-primary" name="delete-button">Delete</button>
        </div>
          <table id="post-table" class="table table-hover"></table>
      </div>
    </div>
    <!-- END DISPLAY POST -->

    
    <script src="scripts/editpost.js" charset="utf-8"></script>

    
    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
    } ?>

</body>

</html>
