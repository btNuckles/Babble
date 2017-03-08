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

session_start();

$login = $_SESSION['userlogin'];
	
$sql = "SELECT * FROM users WHERE username = '" . $login . "'";
$result = mysqli_query($conn, $sql);

//prepare the table
echo '<table border="1">
      <tr>
        <th>Username</th>
        <th>Karma</th>
        </tr>';

while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
        echo '<td class="leftpart">';
        echo  ($row['username']);
        echo '<td class="leftpart">';
          echo '<h3><a href="topic.php?id=' . $row['username'] . '">' . $row['karma'] . '</a><h3>';
          echo '</td>';

    echo '</tr>';
}

mysqli_close($conn);

?>

</body>
</html>
