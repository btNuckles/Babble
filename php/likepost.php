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
$id = $_POST["post_id"];
$sql = "UPDATE posts SET likes = likes + 1 WHERE id = $id";
$insert= mysqli_query($conn, $sql);

$sql = "SELECT likes FROM posts WHERE id = $id";
$newlikes = mysqli_query($conn, $sql);
$likes = mysqli_fetch_array($newlikes);
echo $likes['likes'];
?>
