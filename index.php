<?php
  session_start();

  include("/script/connection.php");
  include("/script/functions.php");
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Docs Locs Maskterkey PWA App - Locksmith solution for Realtors.  Instantly submit a request for your properties at closing, and take all the efforts of making phone calls or leaving text messages.  Docs Locs is a mobile locksmith located in central Arkansas and Ft. Wayne Indiana.">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Docs Locs - Masterkey</title>
  
  
  <link rel="manifest" href="/manifest.json">
  
  <!-- ios support -->
  <link rel="apple-touch-icon" href="img/icons/icon-96x96.png">
  <meta name="apple-mobile-web-app-status-bar" content="#FF1818">
  <meta name="theme-color" content="#898989">

</head>

<body class="grey lighten-4">

  <!-- top nav -->
  <nav class="z-depth-0">
    <div class="nav-wrapper container">
      <a href="/">Docs Locs - MasterKey</a>
    </div>
  </nav>

  <!-- working on adding the promoted pwa install banner -->
<div class="prompt">
  <p>Do you want to install this app to your device?</p>
  <button type="button" class="prompt__install">Yes</button>
  <button type="button" class="prompt__close">No</button>
</div>

    <!-- content -->
    <div class="container grey-text content-main">
      <hr>
      <img class="header-logo" src="img/Header.png" alt="Docs Locs Header Image">
      <h5 class="center">Welcome to Docs Locs - MasterKey</h5>
      <p class="center" style="margin-bottom: -5px;">Please Select Your Location</p>
      <br>
      <a href="pages/ftwayne.html" class="content-button center">FT. WAYNE</a>
      <br>
      <a href="pages/littlerock.html" class="content-button center">LITTLE ROCK</a>
      <br>
      <hr>
      <a href="https://www.facebook.com/docslocs/"><img class="social-icons" src="img/icons/facebook.svg" alt="Docs Locs on Facebook"></a>
    </div>
  
  <!-- materialize icons, css & js -->
  <link type="text/css" href="css/materialize.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" href="css/styles.css" rel="stylesheet">
  <script type="text/javascript" src="js/materialize.min.js"></script>


  <script src="/prompter.js"></script>
  <script src="/app.js"></script>
  <script src="/js/ui.js"></script>
  <script src="/a2hs.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
</html>