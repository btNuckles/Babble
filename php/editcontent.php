<?php
session_start();
$post_id = $_SESSION["p_id"];
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");
$sql = "SELECT * FROM posts WHERE id = '$post_id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$_SESSION["edit_content"] = $row['content'];

mysqli_close($conn);
?>
