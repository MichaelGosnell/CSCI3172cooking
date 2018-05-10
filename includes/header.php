<?php
if(!isset($COOKIE[session_name()])){
  session_start();
  $_SESSION['HTTP_USER_AGENT'] = $_SERVER['HTTP_USER_AGENT'];
}else{
  session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/myStyle.css" type="text/css" media="screen and (min-width: 768px)">
    <link rel="stylesheet" href="css/myStyle.css" type="text/css" media="screen and (max-width: 767px)">
    <title>Main Page</title>
</head>

<body>
    <header class="m-2 head">
        <nav class="navbar navbar-expand-md navbar-dark bg-success rounded">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button><a href="main_page.php">
            <img class="navbar-brand" src='images/logo.jpeg'  width="130px" height="110px"></a>
            <div class="collapse navbar-collapse justify-content-md-center" id="navbarSupportedContent">
              <ul class="navbar-nav">
                  <li class="nav-item mx-4 active">
                      <a class="nav-link" href="recipe.php">Recipe<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item mx-4 active">
                      <a class="nav-link" href="category.php">Category</a>
                  </li>
                  <li class="nav-item mx-4 active">
                      <a class="nav-link" href="search.php">Search</a>
                  </li>

                  <?php
                   if(isset($_SESSION['login_is_succesful'])){
                     if($_SESSION['login_is_succesful']){
                    ?>
                      <li class="nav-item mx-4 active"><a class="nav-link" href="add.php">Add</a></li>
                      <li class="nav-item mx-4 active"><a class="nav-link" href="profile.php">Profile</a></li>
                  <?php }else{ ?>
                      <li class="nav-item mx-4 active"><a class="nav-link" href="login.php">Login</a></li>
                  <?php } }else{ ?>
                      <li class="nav-item mx-4 active"><a class="nav-link" href="login.php">Login</a></li>
                  <?php } ?>

              </ul>
            </div>
        </nav>
    </header>
