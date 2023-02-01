<?php 
  session_start();

  include("../../script/connections.php");
  include("../../script/functions-ftw.php");

  if($_SERVER['REQUEST_METHOD'] == "POST") {
    // something was posted
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($email) && !empty($password)) {
      // read the db
      $query = "select * from users where email = '$email' limit 1";

      $result = mysqli_query($con, $query);

      if($result) {
        if($result && mysqli_num_rows($result) > 0) {
          $user_data = mysqli_fetch_assoc($result);
          
          if($user_data['password'] === $password) {

            $_SESSION['user_id'] = $user_data['user_id'];
            header("Location: ftw-request.php");
            die;
          }
        }
      }
      echo "Wrong username or password!";
    } else {
      echo "Wrong username or password!";
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
          <h6>Realtor Login</h6>
            <div class="divider"></div>
            <div class="input-field">
                <input placeholder="email address" name="email" type="email" class="validate">
                <label for="RLTR-EML">Email</label>
            </div>
            <div class="input-field">
              <input placeholder="password" name="password" type="password" class="validate">
              <label for="RLTR-PAS">Password</label>
            </div>
            <div class="input-field center" style="margin-top: -13px;">
                <button class="btn-small register-submit-btn" id="submit" type="submit">LOGIN</button>
            </div>
        </form>
      </div>
      <!-- end register form -->
      <hr>
      <a href="https://www.facebook.com/docslocs/"><img class="social-icons" src="../../img/icons/facebook.svg"></a>
    </div>
  
  <script src="../../js/ui.js"></script>
</body>
</html>