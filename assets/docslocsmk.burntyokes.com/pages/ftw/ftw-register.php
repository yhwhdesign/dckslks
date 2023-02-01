<?php 
  session_start();

  include("../../script/connections.php");
  include("../../script/functions-ftw.php");

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $coname = $_POST['coname'];
    $rltrname = $_POST['rltrname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loc = "Ft.Wayne";

    if(!empty($coname) && !empty($rltrname) && !empty($phone) && !empty($email) && !empty($password)) {
      // keep going
      $user_id = ftw_random_num(20);
      $query = "insert into users (user_id,coname,rltrname,phone,email,password,loc) values ('$user_id','$coname','$rltrname','$phone','$email','$password','$loc')";

      mysqli_query($con, $query);

      header("Location: ftw-login.php");
    } else {
      echo "Please enter valid information.";
    }
  }

?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Docs Locs - Masterkey</title>

  <!-- materialize icons, css & js -->
  <link type="text/css" href="../../css/materialize.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" href="../../css/styles.css" rel="stylesheet">
  <link rel="manifest" href="/manifest.json">
  <script type="text/javascript" src="../../js/materialize.min.js"></script>

  <!-- ios support -->
  <link rel="apple-touch-icon" href="../../img/icons/icon-96x96.png">
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
      <h5 class="center">Welcome to Docs Locs - Ft. Wayne</h5>
      <br>
      <!-- Register Form - via firebase user auth -->
      <div class="side-form" style="margin-bottom: -25px;">
        <form class="add-recipe container section" method="post">
          <h6 >New Client Registration | Please fill out the form in full.</h6>
            <div class="divider"></div>
            <div class="input-field">
                <input placeholder="Your company name" name="coname" type="text" class="validate">
                <label for="RC-Name">Realtor Co.</label>
            </div>
            <div class="input-field">
              <input placeholder="First, Last Name" name="rltrname" type="text" class="validate">
              <label for="RLTR-Name">Realtor Name</label>
            </div>
            <div class="input-field">
              <input placeholder="(555)-555-5555" name="phone" type="tel" class="validate">
              <label for="RLTR-PH">Contact Number</label>
            </div>
            <div class="input-field">
                <input placeholder="email address" name="email" type="email" class="validate">
                <label for="RLTR-EML">Email</label>
            </div>
            <div class="input-field">
              <input placeholder="password" name="password" type="password" class="validate">
              <label for="RLTR-PAS">Password</label>
            </div>
            <div class="input-field center" style="margin-top: -13px;">
                <button class="btn-small register-submit-btn" id="submit" type="submit">SEND</button>
            </div>
        </form>
      </div>
      <!-- end register form -->
      <hr>
      <a href="https://www.facebook.com/docslocs/"><img class="social-icons" src="../../img/icons/facebook.svg"></a>
    </div>


    <!-- end content -->
  <script src="../../js/ui.js"></script>
</body>
</html>