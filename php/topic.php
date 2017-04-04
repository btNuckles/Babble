<?php
$thread_id = $_GET["id"];
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn == false) {
    die("Connection failed");
}
mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");
// Grabbing title from 'threads' table
$sql = "SELECT * FROM threads, posts WHERE thread_id = '$thread_id' AND threads.time_created = posts.time_created";
$result = mysqli_query($conn, $sql);
$thread = mysqli_fetch_array($result);
  echo '<h3><center>Thread Title: ' . $thread['title'] . '</h3></center>';
  echo '</td>';
  // Grabbing posts from 'posts' table
$sql = "SELECT * FROM posts WHERE thread_id = '$thread_id' ORDER BY time_created ASC LIMIT 10";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
    echo '<th>Author ID: ' . $row['author_id'] . '<br>Likes: '
      . $row['likes'] . '<br>Dislikes: ' . $row['dislikes']
      . '<br>Date Posted: '  . date('M d, Y', strtotime($row['time_created']))
      . '<br>Time Posted: '  . date('H:i:s a', strtotime($row['time_created']));
    echo '<th>Post: ' . $row['content'] . '';
    echo '</td>';
    echo '</tr>';
}
mysqli_close($conn);
?>
