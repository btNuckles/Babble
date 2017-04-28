<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if(isset($_SESSION['userlogin'])){
  $logged_in = TRUE;
}else{
  $logged_in = FALSE;
}
?>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-fixed-top">
  <div id="nav-container mr-auto" class="container-fluid">
    <a id="forum-name" class="navbar-brand" href="#">BABBLE</a>
    <ul id="nav-list" class="nav navbar-nav mr-auto" style="display:inline-block">
      <li class="nav-item active"><a class="nav-link" id="home-link" href="index.php">Home</a></li>
      
      <?php
      #If the user is logged in, echo profile options and logout button
      #Else, echo login and registration options
      if($logged_in){
        echo '<li class="nav-item"><a class="nav-item nav-link" id="view-profile" href="viewprofile.php">View Profile</a></li>';
        echo '<li class="nav-item"><a class="nav-item nav-link" id="edit-profile" href="editprofile.php">Edit Profile</a></li>';
        echo '<li class="nav-item pull-right"><button class="btn btn-primary my-2 my-sm-0" id="logout-button" data-button="logout" type="button" name="button">Logout</button></li>';
      }else {
        echo '<li class="nav-item"><a class="nav-item nav-link" id="register-link" href="register.php">Register</a></li>';
        echo '<li class="nav-item pull-right"><button class="btn btn-primary my-2 my-sm-0" id="login-button" data-button="submit" type="button" name="button">Login</button></li>';
        echo '<li class="nav-item pull-right">';
        echo '<div id="login-box" class="form-inline my-2 my-lg-0">';
          #<!--<div id="login-box" class="form-inline">-->
        echo   '<input class="form-control" id="username" type="text" name="username" placeholder="Username">';
        echo   '<input class="form-control" id="password" type="password" name="password" placeholder="Password"></div></li>';
      }
      ?>

    </ul>
  </div>
</nav>
