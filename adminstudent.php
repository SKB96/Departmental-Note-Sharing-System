<?php include "inc/database.php"; ?><!--include database source-->
<?php include "inc/head.php"; ?><!--include head source-->
<!--page body start-->
<div class="">
  <div class="w3-row">
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
    <div class="w3-col m2 w3-container w3-padding">
      <form action="/search" method="GET">
        <input type="text" class="w3-input w3-border w3-round" placeholder="Search">
      </form>
      <br>
      <p class="rfont w3-small w3-margin-top"><b>ADMIN PANEL</b></p>
      <a href="admin.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Create new notice</b></p></a>
      <a href="adminevent.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>New</b></p></a>
      <a href="admingallery.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Upload gallery image</b></p></a>
      <a href="adminstudent.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Add New Student >></b></p></a>
      <a href="adminteacher.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Add New Teacher</b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <?php
          if(isset($_POST['add_new_student'])){
            echo $_SESSION['msgaddnewstudent'];
            unset($_SESSION['msgaddnewstudent']);
          }
        ?>
        <p class="rfont"><b>ADD NEW STUDENT</b></p>
        <hr>
        <div class="">
          <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <label>Roll</label>
            <input class="w3-input w3-margin-bottom" type="number" name="roll" />
            <label>Name</label>
            <input class="w3-input w3-margin-bottom" type="text" name="name" />
            <label>Session</label>
            <input class="w3-input w3-margin-bottom" type="text" name="session" />
            <label>Present Address</label>
            <input class="w3-input w3-margin-bottom" type="text" name="present" />
            <label>Permanent Address</label>
            <input class="w3-input w3-margin-bottom" type="text" name="permanent" />
            <label>Blood</label>
            <input class="w3-input w3-margin-bottom" type="text" name="blood" />
            <label>Mobile</label>
            <input class="w3-input w3-margin-bottom" type="number" name="moblile" />
            <label>Email</label>
            <input class="w3-input w3-margin-bottom" type="email" name="email" />
            <label>Password</label>
            <input class="w3-input w3-margin-bottom" type="password" name="password" />
            <button class="w3-btn w3-blue w3-right w3-margin-top" name="add_new_student">ADD</button>
            <div class="upload-btn-wrapper">
              <button class="w3-btn w3-orange">Upload Image</button>
              <input type="file" accept="image/*" name="image" onchange="preview_image(event)">
            </div>
          </form>
          <img id="output_image"/ style="width:200px;"><br>

          <script type='text/javascript'>
            function preview_image(event)
            {
             var reader = new FileReader();
             reader.onload = function()
             {
              var output = document.getElementById('output_image');
              output.src = reader.result;
             }
             reader.readAsDataURL(event.target.files[0]);
            }
          </script>
          </form>
        </div>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<script>
  function hide(){
    document.getElementById('msgEvent').style.display="none";
  }
</script>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
