<?php
if(isset($_SESSION['userlogin'])){
  $logged_in = TRUE;
}else{
  $logged_in = FALSE;
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-fixed-top">
  <div id="nav-container mr-auto" class="container-fluid">
    <a id="forum-name" class="navbar-brand" href="#"><img src="images/forumicon.png" height=40px width=40px></a>
    <ul id="nav-list" class="nav navbar-nav mr-auto" style="display:inline-block">
      <li class="nav-item not-login"><a class="nav item nav-link" id="home-link" href="index.php"></a></li>

      <?php
      #If the user is logged in, echo profile options and logout button
      #Else, echo login and registration options
      if($logged_in == TRUE){
        echo '<li class="nav-item not-login"><a class="nav-item nav-link" id="view-profile" href="viewprofile.php"></a></li>';
        echo '<li class="nav-item not-login"><a class="nav-item nav-link" id="edit-profile" href="editprofile.php"></a></li>';
        echo '<li class="nav-item not-login"><a class="nav-item nav-link" id="search-user" href="searchuser.php"></a></li>';
        echo '<li class="nav-item pull-right"><button class="btn btn-primary my-2 my-sm-0" id="logout-button" data-button="logout" type="button" name="button">Logout</button></li>';
        echo '<script src="scripts/index.js" charset="utf-8"></script>';
      }else {
        echo '<li class="nav-item not-login"><a class="nav-item nav-link" id="register-link" href="register.php">Register</a></li>';
        echo '<li class="nav-item pull-right"><button class="btn btn-primary my-2 my-sm-0" id="login-button" data-button="submit" type="button" name="button">Login</button></li>';
        echo '<li class="nav-item pull-right">';
        echo '<div id="login-box" class="form-inline my-2 my-lg-0">';
          #<!--<div id="login-box" class="form-inline">-->
        echo   '<input class="form-control" id="username" type="text" name="username" placeholder="Username">';
        echo   '<input class="form-control" id="password" type="password" name="password" placeholder="Password"></div></li>';
        echo '<script src="scripts/index.js" charset="utf-8"></script>';
      }
      ?>

    </ul>
  </div>
</nav>
