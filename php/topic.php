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

    echo '<tr>';
    //echo '</td>';
    echo '<div class="post-container">';
    echo '<span class="poster">' . $author_row['username'] . '</span>'. '<br>'. '<span class="like-counter">Likes: '
      . $row['likes']. '</span>' . '<br>' . '<span class="dislike-counter">Dislikes: ' . $row['dislikes']
      . '</span>'. '<br>' . '<span class="Date">Date Posted: '  . date('M d, Y', strtotime($row['time_created']))
      .'<span>' . '<br>' . '<span class="Time">Time Posted: '  . date('H:i:s a', strtotime($row['time_created'])) . '</span>';
    echo '<p>'. $row['content'] . '</p>';
    // Check if user is logged in and if so, check their ID
    if (isset($_SESSION['userlogin']) && $id == GetAuthorSession($conn)['id']) {
        // If true, Edit and Delete is shown
        // echo '<td class="rightpart">';
        echo '<span><a href="editpost.php?postid=' . $row['id'] . '">' . "Edit" . '</a><span>';
        //echo '</td>';
    }
    //else {  // Else show nothing
        //echo '<td class="rightpart">';
        //echo '</td>';
    //}
    echo '</div>';
    //echo '</td>';
    echo '</tr>';
    echo '<br>';
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
