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
  echo '<h3><center>Thread Title: ' . $thread['title'] . '</h3></center>';
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
    echo '<th>Author: ' . $author_row['username'] . '<br>Likes: '
      . $row['likes'] . '<br>Dislikes: ' . $row['dislikes']
      . '<br>Date Posted: '  . date('M d, Y', strtotime($row['time_created']))
      . '<br>Time Posted: '  . date('H:i:s a', strtotime($row['time_created']));
    echo '<th>Post: ' . $row['content'] . '';
    // Check if user is logged in and if so, check their ID
    if (isset($_SESSION['userlogin']) && $id == GetAuthorSession($conn)['id']) {
        // If true, Edit and Delete is shown
        echo '<td class="rightpart">';
        echo '<h3><a href="editpost.php?postid=' . $row['id'] . '">' . "Edit" . '</a><h3>';
        echo '</td>';
    }
    else {  // Else show nothing
        echo '<td class="rightpart">';
        echo '</td>';
    }
    echo '</td>';
    echo '</tr>';
}

$sql = "SELECT author_id FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10"
$users = mysqli_query($conn, $sql);
$sql = "SELECT time_create FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10"
$timestamps = mysqli_query($conn, $sql);
$sql = "SELECT likes FROM posts WHERE thread_id = '$thread_id' ORDER BY id DESC LIMIT 10"
$likes = mysqli_query($conn, $sql);

for($i = 0; $i < count ($username); $i++)
{

}

mysqli_close($conn);
?>
