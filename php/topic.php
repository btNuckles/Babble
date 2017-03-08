<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <title>ForumName</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="stylesheets/indexstyles.css">
</head>

<body>
    <header class="main-header">
        <center><h1 class="banner">ForumName</h1></center>
    </header>

    <header id="option-bar">
        <!-- RETURN TO HOMEPAGE -->
        <span class="index">
          <a href="../index.html">
            <button data-button="submit2" type="button" name="homepage">Home Page</button>
          </a>
        </span>
        <!-- RETURN TO HOMEPAGE -->
    </header>

  </body>
  </html>

<center>
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
$sql = "SELECT * FROM threads WHERE id = '$thread_id'";
$result = mysqli_query($conn, $sql);
$thread = mysqli_fetch_array($result);

  echo '<table border="1" style="width:90%"><tr>';
  echo '<h3><center>Thread Title: ' . $thread['title'] . '</h3></center>';
  echo '</td>';
  echo '</tr>';

  // Grabbing posts from 'posts' table
$sql = "SELECT * FROM posts WHERE thread_id = '$thread_id'";
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
