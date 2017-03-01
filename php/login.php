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

$user_name = $_POST['usernameEntered'];
$pass_word = $_POST['passwordEntered'];

$sql = "SELECT password FROM users WHERE username = '$user_name'";

$result = mysql_query($sql, $conn);
$resultArray = array();
if ($result)
{
  $resultArray = mysql_fetch_array($result);
}

if ($pass_word == $resultArray[0])
{
  session_start();

  if(session_status())
  {
    echo "Session is running";
  }
  else {
      echo "No session started";
  }
}

else
{
  die ("User account not found.");
}

?>
