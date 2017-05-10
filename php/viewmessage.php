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

session_start();

$login = $_SESSION['userlogin'];
$recipient = $_POST['recipientEntered'];

$idsql = "SELECT id FROM users WHERE username = '" . $login . "'";
$idresult = mysqli_query($conn, $idsql);
while($idrow = mysqli_fetch_array($idresult)) {
    $id1 = $idrow['id'];
}

$id2sql = "SELECT id FROM users WHERE username = '" . $recipient . "'";
$id2result = mysqli_query($conn, $id2sql);
$id2row = mysqli_fetch_array($id2result);
if ($id2row == 0) {
    echo "user does not exist";
    die();
} else {
    $id2 = $id2row['id'];
}

$messagesql = "SELECT * FROM messages WHERE (id = '$id1' OR id2 = '$id1') AND (id = '$id2' OR id2 = '$id2')";
$messageresult = mysqli_query($conn, $messagesql);

echo '
<style>
.bubbleleft
{
position: relative;
width: 250px;
height: relative;
padding: 5px;
background: #E17000;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
border: #7F7F7F solid 3px;
}

.bubbleleft:after
{
content: \'\';
position: absolute;
border-style: solid;
border-width: 25px 20px 0;
border-color: #E17000 transparent;
display: block;
width: 0;
z-index: 1;
bottom: -25px;
left: 40px;
}

.bubbleleft:before
{
content: \'\';
position: absolute;
border-style: solid;
border-width: 27px 22px 0;
border-color: #7F7F7F transparent;
display: block;
width: 0;
z-index: 0;
bottom: -30px;
left: 38px;
}

.bubbleright
{
position: relative;
width: 250px;
height: relative;
padding: 5px;
background: #FFFFFF;
-webkit-border-radius: 10px;
-moz-border-radius: 10px;
border-radius: 10px;
border: #7F7F7F solid 3px;
}

.bubbleright:after
{
content: \'\';
position: absolute;
border-style: solid;
border-width: 25px 20px 0;
border-color: #FFFFFF transparent;
display: block;
width: 0;
z-index: 1;
bottom: -25px;
left: 169px;
}

.bubbleright:before
{
content: \'\';
position: absolute;
border-style: solid;
border-width: 27px 22px 0;
border-color: #7F7F7F transparent;
display: block;
width: 0;
z-index: 0;
bottom: -30px;
left: 167px;
}
</style>
';

while($messagerow = mysqli_fetch_array($messageresult)) {
    echo '<center>';
    if ($messagerow['id'] == $id1) {
        echo '<div style="overflow: auto; text-align:center; width:500px; height:relative" class="clear_fix">';
        echo '<hr>';
        $poster = $login;
        echo '<div class="bubbleright" style="float:right; margin-bottom:30px">'. $messagerow['message'] .'</div>';
        echo '<div style="clear:both; padding-right:40px" align="right">'.$login.'</div>';
        echo '<div style="clear:both;" align="right"><span class="glyphicon glyphicon-time"></span> ' . $messagerow['timestamp'] . '</div>';

    } else {
        echo '<div style="overflow: auto; text-align:center; width:500px; height:relative" class="clear_fix">';
        echo '<hr>';
        $poster = $recipient;
        echo '<div class="bubbleleft" style="float:left; margin-bottom:30px">'. $messagerow['message'] .'</div>';
        echo '<div style="clear:both; padding-left:40px" align="left">'.$recipient.'</div>';
        echo '<div style="clear:both;" align="left"><span class="glyphicon glyphicon-time"></span> ' . $messagerow['timestamp'] . '</div>';
    }
    echo '</div></center>';
}


mysqli_close($conn);

?>
