<?php
$thread_id = $_SESSION["t_id"];
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");
$sql = "SELECT * FROM posts WHERE thread_id = '$thread_id'";
$result = mysqli_query($conn, $sql);
$thread = mysqli_fetch_array($result);

// check the age of the thread
$time = new DateTime();
$age = new DateTime($thread['time_created']);
$diff = date_diff($age, $time);
if ($diff->format('%d') >= 10) {
    $sql = "UPDATE threads SET locked = 1 WHERE id = '$thread_id'";
    $insert= mysqli_query($conn, $sql);
    $_SESSION['lock'] = true;
}
?>
