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


while($messagerow = mysqli_fetch_array($messageresult)) {
    echo '<hr>';
    if ($messagerow['id'] == $id1) {
        echo '<div style="background-color:#FFFFFF; overflow: auto;" class="clear_fix">';
        $poster = $login;
        echo '<h5><center><span class="glyphicon glyphicon-time"></span> Message to ' . $recipient . ', ' . $messagerow['timestamp'] . '.</center></h5>';
        echo '<p align="right" style="padding-right:25px">' . $messagerow['message'] . '</p>';
    } else {
        echo '<div style="background-color:#E3E3E4; overflow: auto;" class="clear_fix">';
        $poster = $recipient;
        echo '<h5><center><span class="glyphicon glyphicon-time"></span> Message from ' . $recipient . ', ' . $messagerow['timestamp'] . '.</center></h5>';
        echo '<p align="left" style="padding-left:25px">' . $messagerow['message'] . '</p>';
    }
    echo '</div>';
}


mysqli_close($conn);

?>
