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

$email = $_POST['regEmailEntered'];
$user_name = $_POST['regUsernameEntered'];
$pass_word = $_POST['regPasswordEntered'];

$time = date('Y/m/d H:i:s');
$sql = "INSERT INTO users"."(id, username, password, pass_salt, email, reg_date, post_count, karma, admin, banned)"."VALUES(0, '$user_name', '$pass_word', 0, '$email', '$time', 0, 0, 0, 0)";

$insert= mysqli_query($conn, $sql);

 ?>
