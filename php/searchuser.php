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


$user_name = $_POST['searchusernameEntered'];

if ($user_name != "null entry") {
    $searchsql = "SELECT * FROM users WHERE username = '$user_name'";
    $searchresult = mysqli_query($conn, $searchsql);
    $get_rows = mysqli_affected_rows($conn);

    if($get_rows >= 1) {
        while($userrow = mysqli_fetch_array($searchresult))
        {
            echo '<div class="container-fluid" style="padding-top:70px">';
                echo '<div class="row content">';
                    echo '<div class="col-sm-3 col-lg-3 col-xs-12 sidenav">';
                        echo '<img src="images/useravatar.png" alt="Avatar" style="width:250px;height:250px;">';
                        echo '<p style="border:3px; border-style:solid; border-color:#000000; padding: 1em; background-color:#D3D3D3; font-size:130%;">' . $userrow['username'] . '</p>';
                        #echo '<h4>' . $userrow['username'] . '\'s Profile</h4>';
                        echo '<hr>';
                        echo '<hr>';
                        echo '<div class="row">';
                            echo '<div class="col-sm-6">';
                                echo '<h4>Display Name</h4>';
                                echo '<p style="border:3px; border-style:solid; border-color:#D3D3D3; padding: 1em;">';
                                if ( strlen($userrow['displayname']) > 12) {
                                    echo substr($userrow['displayname'], 0, 12);
                                    echo '...';
                                } else {
                                    echo $userrow['displayname'];
                                }
                                echo '</p>';
                            echo '</div>';
                            echo '<div class="col-sm-6">';
                                echo '<h4>Karma</h4>';
                                echo '<p style="border:3px; border-style:solid; border-color:#D3D3D3; padding: 1em;">' . $userrow['karma'] . '</p>';
                            echo '</div>';
                        echo '</div>';
                        echo '<div class="row">';
                            echo '<h4>Bio</h4>';
                            echo '<p style="border:3px; border-style:solid; border-color:#D3D3D3; padding: 1em;">' . $userrow['bio'] . '</p>';
                        echo '</div>';
                        echo '<hr>';
                        echo '<ul class="nav nav-pills nav-stacked">';
                            echo '<li class="active"><a href="sendmessage.php">Send Message</a></li>';
                        echo '</ul>';
                        echo '<hr>';

                    echo '</div>';

                    echo '<div class="col-sm-7 col-lg-8 col-xs-12">';
                        echo '<h4 id="home"><small>RECENT POSTS</small></h4>';
                        echo '<hr>';


                        $postsql = "SELECT * FROM posts WHERE author_id = '" . $userrow['id'] . "' ORDER BY time_created DESC";
                        $postresult = mysqli_query($conn, $postsql);
                        while($postrow = mysqli_fetch_array($postresult)) {

                            $threadsql = "SELECT title FROM threads WHERE id = '" . $postrow['thread_id'] . "'";
                            $threadresult = mysqli_query($conn, $threadsql);
                            while($threadrow = mysqli_fetch_array($threadresult)) {
                                echo '<h2>' . $threadrow['title'] . '</h2>';
                            }
                            echo '<h5><span class="glyphicon glyphicon-time"></span> Post by ' . $userrow['username'] . ', ' . $postrow['time_created'] . '.</h5>';
                            echo '<h5><span class="label label-success">General</span></h5>';
                            echo '<br>';
                            echo '<p>' . $postrow['content'] . '</p>';
                            echo '<hr>';
                        }

                    echo '</div>';
                echo '</div>';
            echo '</div>';
        }
    } else {
        echo "User '$user_name' not found.";
    }
} else {
    echo "User '' not found.";
}

mysqli_close($conn);

?>
