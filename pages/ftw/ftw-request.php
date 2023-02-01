<?php 
  session_start();

  include("../../script/connections.php");
  include("../../script/functions-ftw.php");

  $user_data = check_login($con);

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Docs Locs - Masterkey | FT. Wayne</title>
  <!-- materialize icons, css & js -->
  <link type="text/css" href="/css/materialize.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" href="/css/styles.css" rel="stylesheet">
  <link rel="manifest" href="/manifest.json">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script type="text/javascript" src="/js/materialize.min.js"></script>
  
  <!-- ios support -->
  <link rel="apple-touch-icon" href="/img/icons/icon-96x96.png">
  <meta name="apple-mobile-web-app-status-bar" content="#FF1818">
  <meta name="theme-color" content="#898989">
</head>
<body class="grey lighten-4">

  <!-- top nav -->
  <nav class="z-depth-0">
    <div class="nav-wrapper container">
      <a href="/">Docs Locs - MasterKey - Ft. Wayne</a>
    </div>
  </nav>

    <!-- content -->
    <div class="container grey-text content-main">
      <hr>
      <img class="header-logo" src="../../img/Header.png">
      <h5 class="center">Welcome <?php echo $user_data['rltrname']; ?> to Docs Locs - MasterKey</h5>
      <br>

      <!-- form scripts -->
      <script type="text/javascript">
        $(document).ready(function(){
          $('.datepicker').datepicker();
        });
      </script>
      <!-- end scripts -->

      <!-- Register Form - via firebase user auth -->
      <div class="side-form" style="margin-bottom: -25px;">
          <h6 >Service Request | Please fill out the form in full.</h6>
          <div class="row">
            <form class="col s12" action="#">
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Co. Name" id="coname" name="coname" type="text" class="validate">
                <label for="co_name">Company Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Realtor Name" id="rltrname" name="rltrname" type="text" class="validate">
                <label for="realtor_name">Realtor Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Realtor Email" id="rltremail" name="rltremail" type="email" class="validate">
                <label for="realtor_email">Realtor Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="Client Name" id="clntname" name="clntname" type="text" class="validate">
                <label for="client_name">Client Name</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="MM/DD/YYYY" id="clsngdate" type="text" name="clsngdate" class="datepicker">
                <label for="closing_date">Closing Date</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="123 Street Name, City, Zip" id="clntaddy" name="clntaddy" type="text" class="validate">
                <label for="client_address">Client Address</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <input placeholder="(555) 555-5555" id="clntph" name="clntph" type="text" class="validate">
                <label for="client_phone">Client Phone</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12">
                <textarea placeholder="Special Notes" id="notes" name="notes" class="materialize-textarea"></textarea>
                <label for="scl_info">Special Notes</label>
              </div>
            </div>
            <div class="row">
            <div class="input-field center button-area" style="margin-top: -13px;">
                <button class="btn-small register-submit-btn" id="submit" type="submit">SEND REQUEST</button>
                <span></span>
            </div>
            </div>
          </div>
        </form>
      </div>
      <!-- end register form -->
    <script src="../../js/ftw-script.js"></script>
</body>
</html>