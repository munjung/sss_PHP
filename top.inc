<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="bootstrap-4.1.1/favicon.ico">

    <title>Smart Size Solution</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap-4.1.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/custom.css" rel="stylesheet">
    <!--script-->
  </head>

  <body>

    <nav class="top-nav fixed-top">
      <div class="collapse bg-navy" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">PRODUCTS</h4>
                <ul class="list-unstyled">
                <li><a href="index.php?action=alllist" class="text-white">All</a></li>
                <li><a href="index.php?action=toplist" class="text-white">Top</a></li>
                <li><a href="index.php?action=bottomlist" class="text-white">Bottom</a></li>
                <li><a href="index.php?action=dresslist" class="text-white">Dress</a></li>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">MENU</h4>
              <ul class="list-unstyled">
                <?php

                  if(!isset($_SESSION['id'])) {
                    print '<li><a href="index.php?action=loginform" class="text-white">Login</a></li>';
                    print '<li><a href="index.php?action=joinform" class="text-white">Join</a></li>';

                  } else {
                    print '<li><a href="index.php?action=logout" class="text-white">Logout</a></li>';
                    print '<li><a href="index.php?action=mypage&id=' . $_SESSION['id'] . '" class="text-white">My Page</a></li>';
                  }?>
                <li><a href="#" class="text-white">Cart</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-navy bg-navy">
        <div class="container d-flex justify-content-between">
          <a href="index.php?action=main" class="navbar-brand d-flex align-items-center">
            <h5 class="nav-logo-font">
              <img src="assets/nav_logo.png">
            </h5>
          </a>
          <?php
                if(isset($_SESSION['id'])) {
                  print '<h6 class="text-white"><em>&quot;Welcome ' . $_SESSION['id'] . '!&quot;</em></h6>';
               }
          ?>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </nav>
