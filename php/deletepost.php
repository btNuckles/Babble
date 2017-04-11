<?php
session_start();
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");
$id = $_SESSION["p_id"];
$sql = "DELETE FROM posts WHERE id = '$id'";
$insert= mysqli_query($conn, $sql);

if (session_status())
{ echo "Session is running"; }
else
{ echo "No session started"; }

?>
