<?php
session_start();
$servername = "162.243.184.42";
$username = "sysadmin";
$password = "sys466";
$dbname = "forumproject";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn == false) {
    die("Connection failed");
}

mysqli_select_db($conn, 'forumproject') or die( "Unable to select database");

$pid = $_POST['post_id'];

$login = $_SESSION['userlogin'];
$usersql = "SELECT id FROM users WHERE username = '" . $login . "'";
$userresult = mysqli_query($conn, $usersql);
while ($userrow = mysqli_fetch_array($userresult)) {
    $uid = $userrow['id'];
}

$checklikesql = "SELECT COUNT(*) as count FROM voterecord WHERE userid = $uid AND postid = $pid";
$checklikeresult = mysqli_query($conn, $checklikesql);
if (!$checklikeresult) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
while ($checklikerow = mysqli_fetch_array($checklikeresult)) {
    $likerowcount = $checklikerow['count'];
}

if ($likerowcount == 0) {
    $addlikesql = "UPDATE posts SET dislikes = dislikes + 1 WHERE id = $pid";
    $addlikeinsert = mysqli_query($conn, $addlikesql);

    $insertsql = "INSERT INTO voterecord VALUES('$uid', '$pid', 0, 1)";
    $insertresult = mysqli_query($conn, $insertsql);
} else {
    $checkdislikesql = "SELECT * FROM voterecord WHERE userid = $uid AND postid = $pid";
    $checkdislikeresult = mysqli_query($conn, $checkdislikesql);
    while ($checkdislikerow = mysqli_fetch_array($checkdislikeresult)) {
        $dislikerow = $checkdislikerow['dislikes'];
    }

    if ($dislikerow == 0) {
        $addlikesql = "UPDATE posts SET dislikes = dislikes + 1 WHERE id = $pid";
        $addlikeinsert = mysqli_query($conn, $addlikesql);

        $remlikesql = "UPDATE posts SET likes = likes - 1 WHERE id = $pid";
        $remlikeinsert = mysqli_query($conn, $remlikesql);

        $insertsql = "UPDATE voterecord SET userid = $uid, postid = $pid, likes = 0, dislikes = 1 WHERE userid = $uid AND postid = $pid";
        $insertresult = mysqli_query($conn, $insertsql);

    }
}


$sql = "SELECT likes FROM posts WHERE id = $pid";
$newlikes = mysqli_query($conn, $sql);
$likes = mysqli_fetch_array($newlikes);
echo $likes['likes'];




?>
