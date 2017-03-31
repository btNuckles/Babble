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

// ======= THREAD TABLE ==========
// $board_id = ""; <-- no longer need board table
$title = $_POST['titleEntered'];
// $author_id = ""; <-- not sure where to grab this. 'id' primary key?
// $locked = ""; <-- default is 0
$time = date('Y/m/d H:i:s');
// ======= THREAD TABLE ==========

$sql = "INSERT INTO threads"."(board_id, title, author_id, time_created, locked)"."VALUES(0, '$title', 0, '$time', 0)";
$insert= mysqli_query($conn, $sql);


// ======= POST TABLE ==========
$thread_id = mysqli_insert_id($conn);
// $author_id = ""; <-- not sure where to grab this. 'id' primary key?
$time = date('Y/m/d H:i:s');
$content = $_POST['contentEntered'];
// $likes = ""; <-- default is 0
// $dislikes = ""; <-- default is 0
// ======= POST TABLE ==========

$sql = "INSERT INTO posts"."(thread_id, author_id, time_created, content, likes, dislikes)"."VALUES('$thread_id', 0, '$time', '$content', 0, 0)";
$insert= mysqli_query($conn, $sql);


if (session_status())
{ echo "Session is running"; }
else
{ echo "No session started"; }

 ?>
