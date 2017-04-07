<?php

/* GetAuthorSession
Reads the current session for the author's username
Requires a valid database connection passed as an argument
Returns the entire result row */
function GetAuthorSession($sql_conn) {
  $user_name = $_SESSION['userlogin'];
  $sql = "SELECT * FROM users WHERE username = '$user_name'";
  $result = mysqli_query($sql_conn, $sql);
  $row = mysqli_fetch_array($result);
  return $row;
}

/* GetUserFromId
Takes in a database connection and an id
Returns the entire result row */
function GetUserFromId($sql_conn,$id) {
  $sql = "SELECT * FROM users WHERE id = '$id'";
  $result = mysqli_query($sql_conn, $sql);
  $row = mysqli_fetch_array($result);
  return $row;
}


?>
