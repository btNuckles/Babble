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

$username = $_POST['newusernameEntered'];
$bio = $_POST['bioEntered'];

if ($username != "null entry") {
    $sql = "UPDATE users SET displayname = '$username' WHERE username = '" . $login . "'";
    $insert= mysqli_query($conn, $sql);
}
if ($bio != "null entry") {
    $sql = "UPDATE users SET bio = '$bio' WHERE username = '" . $login . "'";
    $insert= mysqli_query($conn, $sql);
}


#$_SESSION['userlogin'] = $username;


?>
