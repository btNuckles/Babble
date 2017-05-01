<?php
$servername = "162.243.184.42";
$dbusername = "sysadmin";
$dbpassword = "sys466";
$dbname = "forumproject";

$conn = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);

if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");

$user_name = $_POST['usernameEntered'];
$pass_word = $_POST['passwordEntered'];
$sql = "SELECT * FROM users WHERE username = '$user_name'";

$result = mysqli_query($conn, $sql);
$resultArray = array();
if ($result) {
    $resultArray = mysqli_fetch_array($result);
}

if ($pass_word == $resultArray['password']) {
    session_start();

    $_SESSION['userlogin'] = $user_name;
    $_SESSION['is_open'] = true;

    if($resultArray['admin'] != 0){
        $_SESSION['is_admin'] = true;
    } else {
        $_SESSION['is_admin'] = false;
    }

    if(session_status()) {
        echo "Session is running";
    }
    else {
        echo "No session started";
    }
}
else {
  die ("failed login.");
  session_start();
  session_destroy();
}

?>
