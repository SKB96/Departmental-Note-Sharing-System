<?php
     include "inc/database.php";
?>
<!DOCTYPE html>
<html>
<title>Sign In</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="js/jquery.min.js"></script>
<script src="js/angular.js"></script>
<link rel="stylesheet" type="text/css" href="css/w3css.css"/>
<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="fonts/alex-brush.css" rel="stylesheet">
<link href="fonts/great-vives.css" rel="stylesheet">

<body class="">
<div class="w3-row w3-padding-small">
  <div class="w3-col w3-container m4"></div>
  <div class="w3-col m4">
    <div class="w3-container w3-center w3-xxxlarge" style="font-family: 'Alex Brush', cursive; margin-top:10px;">
        Admin
    </div>
    <?php
        if(isset($_POST['signinadmin'])){ ?>
            <div class="w3-container w3-red w3-center" >
              <h3 style="margin:0px;"><?php echo $_SESSION['msglog']; ?></h3>
            </div>
        <?php }
    ?>
    <?php
      if(isset($_SESSION['msgverify'])){
    ?>
        <div class="w3-green w3-center w3-padding w3-margin-bottom"><?php echo $_SESSION['msgverify']; ?>
        </div>
    <?php
      }
    ?>
    <div class="w3-container w3-deep-purple" >
      <h1 style="font-family: 'Great Vibes', cursive; margin-top:10px;">Login Form</h1>
    </div>
    <div class="w3-card-4 w3-white">
      <form class="w3-container" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <p>
        <label>Email</label>
        <input class="w3-input" type="email" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>" required></p>
        <p>
        <label>Password</label>
        <input class="w3-input" type="password" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" required></p>
        <p>
        <input class="w3-check" type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?> />
        <label>Remember me</label><span class="w3-right">
        <button class="w3-btn w3-deep-purple" name="signinadmin">Log In</button></p></span></p>
        <br>
      </form>
    </div>
  </div>
  <div class="w3-col m4"></div>
</div>
</body>
</html>
