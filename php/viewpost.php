<?php
session_start();
$post_id = $_GET["postid"];
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");
$sql = "SELECT * FROM posts WHERE id = '$post_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
echo '<tr>';
echo '<br>Likes: ' . $row['likes'] . '<br>Dislikes: ' . $row['dislikes']
  . '<br>Date Posted: '  . date('M d, Y', strtotime($row['time_created']))
  . '<br>Time Posted: '  . date('H:i:s a', strtotime($row['time_created']));
echo '<th>Post: ' . $row['content'] . '';
echo '</td>';
echo '</tr>';

mysqli_close($conn);
?>
