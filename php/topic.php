<?php

$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");

// select from the database the posts with the same thread id
$id = $_GET['id'];
$sql = "SELECT * FROM threads, posts WHERE $id = board_id AND $id = thread_id";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

echo '<table border="1">
      <tr>
        <th>title</th>
        <th>Post</th>
      </tr>';

// test to see output
while($row = mysqli_fetch_array($result))
{
	echo '<tr>';
        echo '<td class="leftpart">';
        echo  ($row['thread_id']);
        echo '<td class="rightpart">';
          echo $rows['content'];
          echo '</td>';
        echo '</td>';
    echo '</tr>';
}

mysqli_close($conn);

?>
