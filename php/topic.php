<?php
session_start();
$thread_id = $_GET["id"];
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
// Grabbing title from 'threads' table
$sql = "SELECT * FROM threads, posts WHERE thread_id = '$thread_id' AND threads.id = posts.thread_id";
$result = mysqli_query($conn, $sql);
$thread = mysqli_fetch_array($result);
  echo '<h3><center>' . $thread['title'] . '</h3></center>';
  echo '</td>';
// Grabbing posts from 'posts' table
$sql = "SELECT * FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result))
{
    $id = $row['author_id'];
    $author_sql = "SELECT * FROM users WHERE id = $id LIMIT 1";
    $author_result = mysqli_query($conn, $author_sql);
    $author_row = mysqli_fetch_array($author_result);
    $loggedin = isset($_SESSION['userlogin']);
    $author_name = $author_row['username'];
    $post_id = $row['id'];
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
    echo '<span class="poster">' . $author_name . '</span>';
    echo '<div class="post-avatar">' . 'AVATAR HERE' . '</div>';
	if ($loggedin) {
      echo '<div class="post-votes"><button data-button="dislike-button" onclick=dislikeFunction(event,' . $post_id . ')>Dislike</button> ';
      echo $score;
	  echo ' <button data-button="like-button" onclick=likeFunction(event,' . $post_id . ')>Like</button></div>';
	} else {
	  echo '<span class="like-counter">Score: ' . $score . '</span>';
	}
    echo '</div>';
    //End Poster-Info

    //Begin Post-Content
    echo '<div class="post-content">';
    echo '<div class="post-info">';
    if ($loggedin && ($id == GetAuthorSession($conn)['id'] || $_SESSION['is_admin'])) {
      echo '<span class="post-edit"><a href="editpost.php?postid=' . $post_id . '">' . 'Edit' . '</a>' . ' | ' . '</span>';
    }
    echo '<span class="post-date">Posted: ' . $date . ' at ' . $time . '</span></div>';
    echo '<p>' . $content . '</p>';
    echo '<span class="Hidden" style="display:none">' . $post_id . '</span>';
    echo '</div>';
    //End Post-Content

    // Check if user is logged in and if so, check their ID
    // If true, or if user is admin, Edit and Delete are shown

    echo '</div>';
    //End Post
}

//Creates a more organized div to insert into the table
/*
$sql_users = "SELECT author_id FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10";
$users_result = mysqli_query($conn, $sql_users);
$users = mysqli_fetch_array($users_result);

$sql_time = "SELECT time_created FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10";
$time_result = mysqli_query($conn, $sql_time);
$timestamps = mysqli_fetch_array($time_result);

$sql_likes = "SELECT likes FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10";
$likes_result = mysqli_query($conn, $sql_likes);
$likes = mysqli_fetch_array($likes_result);

for($i = 0; $i < count($users)-1; $i++)
{
  echo '<tr>';
  echo '<div class=\'container\'>';
  echo $users[$i];
  echo '</div>';
  echo '</tr>';
}
*/
mysqli_close($conn);
?>
