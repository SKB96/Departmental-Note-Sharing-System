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
      <p class="rfont w3-small w3-margin-top"><b>CATAGORIES</b></p>
      <a href="index.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Job & Fairs >></b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <?php
          if(isset($_POST['signinjob'])){
            echo $_SESSION['msgsigninjob'];
          }
        ?>
        <?php
          if(isset($_POST['new_job_post'])){
            echo $_SESSION['msgjobpost'];
          }
        ?>
        <?php
           if(isset($_SESSION['userid'])){
              if($_SESSION['userid']!="" && $_SESSION['password']!=""){
        ?>
        <p class="rfont"><b>CREATE NEW POST</b></p>
        <div class="w3-container w3-border w3-padding-16 w3-light-grey">
          <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="userid" value="<?php echo $_SESSION['userid']; ?>" style="display: none;" />
            <label>SHARE YOUR EXPERIENCE</label>
            <textarea type="text" name="text" class="w3-input w3-border w3-margin-top" rows="5" placeholder="Text..."></textarea>
            <button class="w3-btn w3-deep-purple w3-right w3-margin-top" name="new_job_post">POST</button>
            <div class="upload-btn-wrapper w3-margin-top">
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
        </div>
        <?php   }else{  ?>
          <button id="jobbtn" class="w3-button w3-deep-purple w3-hover-deep-purple w3-margin-top w3-round-xxlarge rfont w3-hover-block" onclick="signinjob()" style="font-size: 16px;">Sign in to post...</button>
          <div id="signinjob" class="w3-animate-top w3-margin-top" style="padding:0px; display: none;">
            <div class="w3-deep-purple jobmodelcontext">
              <div class="w3-container">
                <div class="w3-center w3-container"><br>
                  <div class="rfont w3-margin-bottom w3-text-white"><b>SIGN IN</b><button class="w3-btn w3-right w3-hover-red" onclick="cancle()"><i class="fas fa-times"></i></button></div>
                </div>
                <div class="w3-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                       <label>USER ID</label>
                       <input type="number" class="w3-input w3-margin-bottom w3-block" name="userid" required />
                       <label>PASSWORD</label>
                       <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                       <button class="w3-button w3-green w3-border w3-margin-bottom" name="signinjob">SIGN IN</button>
                    </form>
                 </div>
              </div>
            </div>
          </div>
        <?php   }}else{ ?>
          <button id="jobbtn" class="w3-button w3-deep-purple w3-hover-deep-purple w3-margin-top w3-round-xxlarge rfont w3-hover-block" onclick="signinjob()" style="font-size: 16px;">Sign in to post...</button>
          <div id="signinjob" class="w3-animate-top w3-margin-top" style="padding:0px; display: none;">
            <div class="w3-deep-purple jobmodelcontext">
              <div class="w3-container">
                <div class="w3-center w3-container"><br>
                  <div class="rfont w3-margin-bottom w3-text-white"><b>SIGN IN</b><button class="w3-btn w3-right w3-hover-red" onclick="cancle()"><i class="fas fa-times"></i></button></div>
                </div>
                <div class="w3-container">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                       <label>USER ID</label>
                       <input type="number" class="w3-input w3-margin-bottom w3-block" name="userid" required />
                       <label>PASSWORD</label>
                       <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                       <button class="w3-button w3-green w3-border w3-margin-bottom" name="signinjob">SIGN IN</button>
                    </form>
                 </div>
              </div>
            </div>
          </div>
        <?php }  ?>

        <script>
        function signinjob(){
          document.getElementById('signinjob').style.display='block';
          document.getElementById('jobbtn').style.display='none';
        }
        function cancle(){
          document.getElementById('signinjob').style.display='none';
          document.getElementById('jobbtn').style.display='block';
        }
        </script>
        <hr>
        <p class="rfont"><b>RECENT POST</b></p>
        <hr>
        <!--extract notice board start-->
        <?php
        	 $sqlNotice="SELECT * from jobandfairs order by n desc";
        	 $resultNotice=mysqli_query($con,$sqlNotice);
           while($rowNotice = $resultNotice->fetch_assoc()){
        ?>
        <!--extract notice board end-->
        <div class="w3-border w3-padding">
          <p class="w3-tiny w3-text-gray"><?php echo $rowNotice['date']; ?>, <?php echo $rowNotice['time']; ?> | <?php echo $rowNotice['userid']; ?></p>
          <p><?php echo $rowNotice['text']; ?></p>
          <?php
            $image=$rowNotice['image'];
            if($image!=""||$image!=null){
          ?>
            <img src="uploads/job/<?php echo $rowNotice['image']; ?>" width="100%">
          <?php } ?>
        </div>
        <hr>
        <?php
          }
        ?>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
