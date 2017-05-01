<?php
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);

$thread_id = $_SESSION["t_id"];
if ($conn == false) {
    die("Connection failed");
}
mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");

$media_sql = "SELECT media FROM threads WHERE id = '$thread_id'";
$media = mysqli_query($conn, $media_sql);
$media_embed = mysqli_fetch_array($media);
echo $media_embed['media'];
//$media_embed = mysqli_fetch_array($media);
//echo $media_embed['media'];
?>
