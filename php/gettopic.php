<?php
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

$sql = "SELECT * FROM threads WHERE board_id = '0' ORDER BY id DESC LIMIT 20";
$result = mysqli_query($conn, $sql);

echo '<div class="topicrow">
<div class="topiccell" style="width:15%;"><b>Author</b></div>
<div class="topiccell" style="width:70%;"><b>Topic</b></div>
<div class="topiccell" style="width:15%;"><b>Created</b></div>
</div>';

while($row = mysqli_fetch_array($result))
{
    $time = date('H:i:s a', strtotime($row['time_created']));
    $date = date('M d, Y', strtotime($row['time_created']));
    $author = GetUserFromId($conn,$row['author_id'])['username'];
    $title = $row['title'];
    $id = $row['id'];

    echo '<div class="topicrow">';
    echo '<div class="topiccell" style="width:15%;">' . $author . '</div>';
    echo '<div class="topiccell" style="width:70%;"><h3><a href="topic.php?id='. $id .'">' . $title . '</a><h3></div>';
    echo '<div class="topiccell" style="width:15%;">' . $time . '<br>' . $date . '</div>';
    echo '</div>';
}

mysqli_close($conn);

?>

</body>
</html>
