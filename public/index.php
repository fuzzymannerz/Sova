<?php require "inc/header.php" ?>

   
      <!-- Header Bar -->
      <div class="navbar-fixed green">
        <nav>
          <div class="nav-wrapper green">
            <a href="index.php" class="brand-logo center"><?php echo $siteTitle; ?></a>
          </div>
        </nav>
      </div>


      <!-- Main Content -->
      <div class="container">
      
      <?php
      if ($siteLogo) {
        print '<img src="' . $siteLogo . '" class="center">';
      }
      ?>
        
          <p class="flow-text center">Welcome to <?php echo $siteTitle ?>.</p>
          <p class="flow-text center">Please check in below.</p>
      </div>


      <!-- Javascript Files -->
      <?php include_once "php/js.php" ?>

      <!-- Load page footer -->
      <?php include "inc/footer.php"; ?>

    </body>
  </html>