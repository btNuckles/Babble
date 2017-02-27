<?php
$email = $username = $password = $passwordConfirmation = "";
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";

$conn = mysql_connect($servername, $username, $password, $dbname);

$email = $_POST['email'];
$user_name = $_POST['username'];
$pass_word = $POST['password'];

if ($conn == false) {
    die("Connection failed");
}

echo "Connected successfully";

@mysql_select_db($dbname) or die( "Unable to select database");

echo "Database selected";

$output = mysql_query("SELECT * FROM users");
$values = mysql_fetch_row($output);
echo json_encode($values);
 ?>
