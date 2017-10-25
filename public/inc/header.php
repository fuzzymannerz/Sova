<!DOCTYPE html>
  <?php
  define('indexrun', true);
  $installed = false;
  require '../php/config.php';
  if(!$installed){ header('Location: ../setup/setup.php'); exit;};
  if (!isset($siteTitle)) {die('Sova is not yet configured. Please login to the admin panel at /admin to configure settings first.'); exit;}
  require '../php/dbconnect.php'; ?>
  <html>
    <head>
      <title><?php echo $siteTitle; ?> | Sova</title>
      <link href="//fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>



    </head>

    <body>