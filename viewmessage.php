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
    <!-- VIEW MESSAGE FORM -->
    <div class="center-div">
      <div id="loaddiv" class="container" overflow:auto>
          <div id="message-box" class="container" style="padding-top:70px">
                <h1><center>Search Users for Chat History</center></h1>
                <?php
                $servername = "162.243.184.42";
                $username = "sysadmin";
                $password = "sys466";
                $dbname = "forumproject";

                $conn = mysqli_connect($servername, $username, $password, $dbname);

                if ($conn == false) {
                    die("Connection failed");
                }

                mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");

                $idsql = "SELECT id FROM users WHERE username = '".$_SESSION['userlogin']."'";
                $idresult = mysqli_query($conn, $idsql);
                while($idrow = mysqli_fetch_array($idresult)) {
                    $id1 = $idrow['id'];
                }

                $messagesql = "SELECT DISTINCT id, id2 FROM messages WHERE id2 = $id1";
                $messageresult = mysqli_query($conn, $messagesql);



                echo '<table style="width:20%; padding:5px; text-align:center; ">';
                echo '<tr style=" border-bottom: 1px solid black"><th colspan="2" style="text-align:center">Inbox</th></tr>';

                while($messagerow = mysqli_fetch_array($messageresult)) {
                    $senderid = $messagerow['id'];

                    $sendersql = "SELECT username FROM users WHERE id = '".$senderid."'";
                    $senderresult = mysqli_query($conn, $sendersql);
                    while($senderrow = mysqli_fetch_array($senderresult)) {
                        $sendername = $senderrow['username'];
                    }


                    echo '<tr>';
                    echo '<td style="padding:5px">';
                    echo '<img src="images/useravatar.png" alt="Avatar" style="width:50px;height:50px;">';
                    echo '</td>';
                    echo '<td>';
                    echo $sendername;
                    echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
                ?>
                <hr>
                <b class="input-boxes"><input class="form-control" style="display:block;float:left;align:center;width:300px" id="recipient-name" type="text" name="recipient-name" Placeholder="User Name"></b>
                <button id="search-button" class="btn btn-primary" data-button="search-submit" type="button" name="search-button" style="display:block;float:left">Search User</button>
                <p id="hidden-recipient-empty-error" style="color:red; display:none">* The recipient field must be filled out.</p>
                <p id="hidden-wrong-username-error" style="color:red; display:none">* User not found.</p><br>

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
    </div>
    </div>
    



    <script src="scripts/viewmessage.js" charset="utf-8"></script>



    <?php if(isset($_SESSION['userlogin'])) {
        echo "<script> checkForSession(); </script>";
     } ?>

</body>

</html>
