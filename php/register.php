<?php
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";

$conn = mysql_connect($servername, $username, $password, $dbname);

if ($conn == false) {
    die("Connection failed");
}

mysql_select_db($dbname) or die( "Unable to select database");

$email = $_POST['emailEntered'];
$user_name = $_POST['usernameEntered'];
$pass_word = $_POST['passwordEntered'];

$time = date('Y/m/d H:i:s');
$sql = "INSERT INTO users"."(id, username, password, pass_salt, email, reg_date, post_count, karma, admin, banned)"."VALUES(0, '$user_name', '$pass_word', 0, '$email', '$time', 0, 0, 0, 0)";

$insert= mysql_query($sql, $conn);
 ?>
