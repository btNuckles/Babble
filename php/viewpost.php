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
$sql = "SELECT * FROM posts WHERE id = '$post_id' LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);
$id = $row['author_id'];
$author_sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
$author_result = mysqli_query($conn, $author_sql);
$author_row = mysqli_fetch_array($author_result);
$author_name = $author_row['username'];
$likes = $row['likes'];
$dislikes = $row['dislikes'];
$score = $likes - $dislikes;
$date = date('M d, Y', strtotime($row['time_created']));
$time = date('H:i:s a', strtotime($row['time_created']));
$content = $row['content'];

//Start Post
echo '<div class="post-container">';

//Begin Poster-Info
echo '<div class="poster-info">';
echo '<span class="poster">' . '<img src="images/useravatar.png" alt="Avatar" style="width:20px;height:auto">' .  "  " . $author_name . '</span>';
echo '<span class="like-counter">Score: ' . $score . '</span>';
echo '</div>';
//End Poster-Info

//Begin Post-Content
echo '<div class="post-content">';
echo '<div class="post-info">';
echo '<span class="post-date">Posted: ' . $date . ' at ' . $time . '</span></div>';
echo '<p>' . $content . '</p>';
echo '</div>';
//End Post-Content

// Check if user is logged in and if so, check their ID
// If true, or if user is admin, Edit and Delete are shown

echo '</div>';
//End Post
mysqli_close($conn);
?>
