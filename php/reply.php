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
// ======= POST TABLE ==========
// $author_id = ""; not currently implemented
$time = date('Y/m/d H:i:s');
$content = $_POST['contentEntered'];
// $likes = ""; not currently implemented
// $dislikes = ""; not currently implemented
// ======= POST TABLE ==========
$id = $_SESSION["t_id"];
$sql = "INSERT INTO posts"."(thread_id, author_id, time_created, content, likes, dislikes)"."VALUES('$id', 0, '$time', '$content', 0, 0)";
$insert= mysqli_query($conn, $sql);


if (session_status())
{ echo "Session is running"; }
else
{ echo "No session started"; }

 ?>
