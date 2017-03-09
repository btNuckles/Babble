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

$sql = "SELECT * FROM threads WHERE board_id = '0' ORDER BY time_created DESC LIMIT 10";
$result = mysqli_query($conn, $sql);

//prepare the table
echo '<table border="1">
      <tr>
        <th>Author</th>
        <th>Topic</th>
        <th>Created at</th>
      </tr>';

while($row = mysqli_fetch_array($result))
{
    echo '<tr>';
        echo '<td class="leftpart">';
        echo  ($row['board_id']);
        echo '<td class="leftpart">';
          echo '<h3><a href="topic.html?id=' . $row['board_id'] . '">' . $row['title'] . '</a><h3>';
          echo '</td>';
        echo '<td class="rightpart">';
            echo date('H:i:s a', strtotime($row['time_created']));
            echo '<br>';
            echo date('M d, Y', strtotime($row['time_created']));
        echo '</td>';
    echo '</tr>';
}

mysqli_close($conn);

?>

</body>
</html>
