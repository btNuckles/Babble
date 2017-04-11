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
$message = $_POST['messageEntered'];

$usersql = "SELECT id FROM users WHERE username = '" . $login . "'";
$userresult = mysqli_query($conn, $usersql);
while($userrow = mysqli_fetch_array($userresult)) {
    $id1 = $userrow['id'];
}

$recipientsql = "SELECT id FROM users WHERE username = '" . $recipient . "'";
$recipientresult = mysqli_query($conn, $recipientsql);
$recipientrow = mysqli_fetch_array($recipientresult);

if ($recipientrow == 0) {
    echo "user does not exist";
    die();
} else {
    echo "user exists";
    $id2 = $recipientrow['id'];
    $time = date('Y/m/d H:i:s');

    $sql = "INSERT INTO messages VALUES('$id1', '$id2', '$message', '$time')";
    $insert= mysqli_query($conn, $sql);
}

mysqli_close($conn);

?>
