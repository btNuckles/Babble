<?php
if (!isset($_SESSION)) session_start();
if(session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['userlogin'])) {
    echo "true";
} else {
    echo "false";
}
 ?>
