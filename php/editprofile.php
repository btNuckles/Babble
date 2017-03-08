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
	
$username = $_POST['usernameEntered'];
$karma = $_POST['karmaEntered'];

$sql = "UPDATE users SET username='$username', karma='$karma' WHERE username = '" . $login . "'";
$insert= mysqli_query($conn, $sql);

$_SESSION['userlogin'] = $username;


?>