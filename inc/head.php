<!DOCTYPE html>
<html>
  <head>
    <title>CSE Department</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/w3css.css">
    <link rel="stylesheet" href="css/railwayFonts.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/angular.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <style>
      .rfont{
        font-family: 'Raleway', sans-serif;
      }
      .upload-btn-wrapper {
       position: relative;
       overflow: hidden;
       display: inline-block;
     }
     .upload-btn-wrapper input[type=file] {
       font-size: 100px;
       position: absolute;
       left: 0;
       top: 0;
       opacity: 0;
     }
     .w3-input:focus{
          outline: none;
      }
      ::-webkit-scrollbar {
          display: none;
      }
    </style>
    <style>
      .mySlides {display:none;}
    </style>
  </head>
  <body>
    <!-- Sidebar -->
    <nav class="w3-sidebar w3-black w3-animate-top w3-xxlarge rfont" style="display:none;" id="mySidebar">
      <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-white w3-hover-red w3-large w3-padding" style="position: absolute; top: 15px; right:15px;">
        <i class="fas fa-times"></i>
      </a>
      <div class="w3-bar-block w3-padding">
        <img src="gallery/logo.png" width="54px" class="w3-margin-left w3-margin-bottom w3-margin-top" />
        <a href="index.php" class="w3-xlarge w3-bar-item w3-button w3-text-white">HOME</a>
        <a href="note.php" class="w3-xlarge w3-bar-item w3-button w3-text-white">NOTE</a>
        <a href="information.php" class="w3-xlarge w3-bar-item w3-button w3-text-white">INFORMATION</a>
        <a href="alumna.php" class="w3-xlarge w3-bar-item w3-button w3-text-white">ALUMNI</a>
        <a href="jobandfairs.php" class="w3-xlarge w3-bar-item w3-button w3-text-white">JOB & FAIRS</a>
        <br>
      </div>
    </nav>
    <div class="w3-row w3-deep-purple">
        <div class="w3-col m1 w3-hide-small"><p><br></p></div>
        <div class="w3-col m10">
          <div class="w3-bar w3-container w3-deep-purple w3-padding-16">
            <a href="index.php"><img src="gallery/logo.png" width="54px" class=""/></a>
            <span class="w3-button w3-xlarge w3-text-light-gray w3-hover-deep-purple w3-right w3-hide-large" onclick="w3_open()"><i class="fas fa-bars"></i></span>
            <a href="jobandfairs.php" class="w3-padding-16 w3-margin-left w3-right w3-hover-deep-purple w3-bar-item w3-button w3-hide-small w3-hide-medium">JOB & FAIRS</a>
            <a href="alumna.php" class="w3-padding-16 w3-margin-left w3-right w3-hover-deep-purple w3-bar-item w3-button w3-hide-small w3-hide-medium">ALUMNI</a>
            <a href="information.php" class="w3-padding-16 w3-margin-left w3-right w3-hover-deep-purple w3-bar-item w3-button w3-hide-small w3-hide-medium">INFORMATION</a>
            <a href="note.php" class="w3-padding-16 w3-margin-left w3-right w3-hover-deep-purple w3-bar-item w3-button w3-hide-small w3-hide-medium">NOTE</a>
            <a href="index.php" class="w3-padding-16 w3-margin-left w3-right w3-hover-deep-purple w3-bar-item w3-button w3-hide-small w3-hide-medium">HOME</a>
          </div>
        </div>
        <div class="w3-col m1 w3-hide-small"><p><br></p></div>
      </div>
      <br>
