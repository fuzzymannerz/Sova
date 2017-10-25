<!DOCTYPE html>
  <?php define('indexrun', true); $installed = false; require '../../php/config.php';
  if ($installed){die('Sova is already installed. Please delete the \'setup\' folder from the /public directory. If you wish to remove and re-install Sova, please refer to the online docs.');exit;} ?>
  <html>
    <head>
      <title>Sova | Setup Wizard</title>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css"  media="screen,projection"/>
      <link type="text/css" rel="stylesheet" href="../css/style.css"  media="screen,projection"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	    <?php require_once "../../php/js.php"; ?>

    </head>

    <body>

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

<header>
	<div class="row">
  <nav>
    <div class="nav-wrapper green darken-1">
      <a href="setup.php" class="brand-logo center">Sova | Setup Wizard</a>
    </div>
  </nav>
  <div class="container">
    <div class="center">
      <a href="setup.php" class="center"><br><img src="../img/sova.png" width="150px" height="auto"></a>
    </div>
  </div>
    </div>
</header>
