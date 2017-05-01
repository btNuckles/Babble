<?php
session_start();
include "functions.php";
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
$media = $_POST['mediaLink'];
$author_id = GetAuthorSession($conn)['id'];
// $locked = ""; <-- default is 0
$time = date('Y/m/d H:i:s');
// ======= THREAD TABLE ==========

$sql = "INSERT INTO threads"."(board_id, title, author_id, time_created, locked, media)"."VALUES(0, '$title', '$author_id', '$time', 0, '$media')";
$insert= mysqli_query($conn, $sql);


// ======= POST TABLE ==========
$thread_id = mysqli_insert_id($conn);
$time = date('Y/m/d H:i:s');
$content = $_POST['contentEntered'];
// $likes = ""; <-- default is 0
// $dislikes = ""; <-- default is 0
// ======= POST TABLE ==========

$sql = "INSERT INTO posts"."(thread_id, author_id, time_created, content, likes, dislikes, media)"."VALUES('$thread_id', '$author_id', '$time', '$content', 0, 0, '$media')";
$insert= mysqli_query($conn, $sql);


if (session_status())
{ echo "Session is running"; }
else
{ echo "No session started"; }

 ?>
