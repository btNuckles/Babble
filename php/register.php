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

if(isset($user_name)){
    $mysql_get_users = mysqli_query($conn, "SELECT * FROM users where username='$user_name'");
    $get_rows = mysqli_affected_rows($conn);

    if($get_rows >= 1) {
        echo "user exists";
        die();
    } else {
        echo "user not taken";
        $time = date('Y/m/d H:i:s');
        $sql = "INSERT INTO users"."(id, username, password, pass_salt, email, reg_date, post_count, karma, admin, banned, displayname)"."VALUES(0, '$user_name', '$pass_word', 0, '$email', '$time', 0, 0, 0, 0, '$user_name')";

        $insert= mysqli_query($conn, $sql);
    }
}
 ?>
