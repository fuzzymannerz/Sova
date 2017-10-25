<!DOCTYPE html>
<?php
if(!$installed){ header('Location: ../../setup/setup.php'); exit;};
session_start();
if (!$_SESSION["adminlogin"]) { header('Location: login.php'); };
$user = $_SESSION["adminlogin"];
define("dashboard", true);
require "inc/functions.php";
?>



<!-- Page loading container -->
  <div id="loading">

<div id="loadingspinner">
    <div class="preloader-wrapper big active">
      <div class="spinner-layer spinner-green-only">
        <div class="circle-clipper left">
          <div class="circle"></div>
        </div><div class="gap-patch">
          <div class="circle"></div>
        </div><div class="circle-clipper right">
          <div class="circle"></div>
        </div>
      </div>
    </div>
    <p id="loadingcontent">Loading</p>

  </div>
</div>


  <html>
    <head>
      <title>Admin Dashboard | Sova</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

      <!-- JS -->
      <?php require_once "../../php/js.php" ?>
      <script type="text/javascript" src="inc/cookie.js"></script>

    </head>

    <body>

<header>
  <div class="row">

  <nav class="nav-extended">
    <div class="nav-wrapper green">
      <a href="dashboard.php" class="brand-logo center">Sova | Admin Dashboard</a>
      <img src="../img/sova.png" width="auto" height="55" class="left brand-logo" style="padding-left: 1%">


      <a href="#" data-activates="mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a href="logout.php">Logout <?php echo $user; ?></a></li>
      </ul>
      <ul class="side-nav" id="mobile">
        <li><a href="logout.php">Logout <?php echo $user; ?></a></li>
      </ul>
    </div>
  </nav>
  </div>

</header>