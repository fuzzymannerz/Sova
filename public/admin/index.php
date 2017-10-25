  <?php
  define('indexrun', true);
  $installed = false;
  require '../../php/config.php';
  if(!$installed){ header('Location: ../setup/setup.php'); exit;};
  session_start();
  if($_SESSION["adminlogin"]){
  	header('Location: dashboard.php');
  	exit;
  }
  else{
  	header('Location: login.php');
  	exit;
  }