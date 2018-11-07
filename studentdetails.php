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
      <p class="rfont w3-small w3-margin-top"><b>BATCH</b></p>
      <?php
         $sqlBatch="SELECT * from batch where status='running' order by n asc";
         $resultBatch=mysqli_query($con,$sqlBatch);
         while($rowBatch = $resultBatch->fetch_assoc()){
      ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="batchName" value="<?php echo $rowBatch['session']; ?>" style="display: none;">
        <p class="rfont w3-small w3-bar w3-text-black"><b><button class="w3-btn" name="batch">CSE <?php echo $rowBatch['session']; ?> Batch</button></b></p>
      </form>
      <?php
        }
        $roll=$_SESSION['studentroll'];
      ?>
    </div>
    <div id="signin" class="w3-modal">
       <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
         <div class="w3-center"><br>
           <div class="w3-text-black rfont w3-margin-bottom"><b>SIGN IN</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('signin').style.display='none'"><i class="fas fa-times"></i></button></div>
         </div>
         <div class="w3-container">
             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="number" class="w3-input w3-margin-bottom" name="userid" value="<?php echo $roll; ?>" style="display: none;" required />
                <label>PASSWORD</label>
                <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                <button class="w3-button w3-green w3-border w3-margin-bottom" name="signin">SIGN IN</button>
             </form>
          </div>
       </div>
     </div>
     <div id="edit" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
          <div class="w3-center"><br>
            <div class="w3-text-black rfont w3-margin-bottom"><b>EDIT</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('edit').style.display='none'"><i class="fas fa-times"></i></button></div>
          </div>
          <div class="w3-container">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                 <input type="text" class="w3-input w3-margin-bottom" name="userid" value="<?php echo $roll; ?>" required style="display: none;" />
                 <label>CURRENTLY WORKING WITH</label>
                 <input type="text" class="w3-input w3-margin-bottom" name="working" required />
                 <label>LOCATION</label>
                 <input type="text" class="w3-input w3-margin-bottom" name="location" required />
                 <label>DESIGNATION</label>
                 <input type="text" class="w3-input w3-margin-bottom" name="designation" required />
                 <label>EXPERT IN</label>
                 <input type="text" class="w3-input w3-margin-bottom" name="expertin" required />
                 <label>PASSWORD</label>
                 <input type="password" class="w3-input w3-margin-bottom" name="password" required />
                 <button class="w3-button w3-green w3-border w3-margin-bottom" name="updateinfo">UPDATE</button>
              </form>
           </div>
        </div>
      </div>
     <div id="signout" class="w3-modal">
        <div class="w3-modal-content w3-card-4 w3-animate-top" style="max-width:600px">
          <div class="w3-center"><br>
            <div class="w3-text-black rfont w3-margin-bottom"><b>ARE YOU SURE YOU WANT TO SIGN OUT NOW??</b><button class="w3-btn w3-right w3-hover-red" onclick="document.getElementById('signout').style.display='none'"><i class="fas fa-times"></i></button></div>
          </div>
          <div class="w3-container">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                 <button class="w3-button w3-red w3-border w3-margin-bottom w3-block" name="signout">SIGN OUT</button>
              </form>
           </div>
        </div>
      </div>
    <div class="w3-col m8 w3-container w3-padding">
      <?php
        if(isset($_POST['signin'])){
          echo $_SESSION['msgsignin'];
        }
      ?>
      <?php
        if(isset($_POST['updateinfo'])){
          echo $_SESSION['msgupdate'];
        }
      ?>
      <div class="w3-border w3-padding-large">
        <p class="rfont" style="text-transform: uppercase; "><b>Student Information, Roll - <?php echo $roll; ?></b></p>
        <hr>
        <!--extract notice board start-->
        <?php
           $roll=$_SESSION['studentroll'];
        	 $sqlstudentdetails="SELECT * from signin where userid='$roll'";
        	 $resultstudentdetails=mysqli_query($con,$sqlstudentdetails);
           $rowstudentdetails = $resultstudentdetails->fetch_assoc();

           $sqlstudentsignin="SELECT * from signin where userid='$roll'";
        	 $resultstudentsignin=mysqli_query($con,$sqlstudentsignin);
           $rowstudentsignin = $resultstudentsignin->fetch_assoc();
        ?>
        <div class="w3-row">
          <div class="w3-col m4 w3-padding-16 w3-container w3-light-grey">
            <img src="uploads/image/<?php echo $rowstudentdetails['image']; ?>" width="100%" />
          </div>
          <div class="w3-col m8 w3-padding w3-rightbar w3-right-align">
            <p class="rfont"><b class="w3-light-gray w3-padding w3-round">Career Information</b></p>
            <?php
              if($rowstudentsignin['working']!=""){
            ?>
                <p>Currently working with <b><?php echo $rowstudentsignin['working']; ?></b>, <?php echo $rowstudentsignin['location']; ?></p>
            <?php
              }
            ?>
            <p><?php echo $rowstudentsignin['designation']; ?></p>
            <?php
              if($rowstudentsignin['working']!=""){
            ?>
                <p>Experts in <?php echo $rowstudentsignin['expert']; ?></p>
            <?php
              }
            ?>
          </div>
        </div>
        <br>

        <div class="w3-padding w3-light-grey">
          <p class="rfont"><b>ABOUT</b></p>
          <div style="padding-left:15px;">
            <p><b>ID</b> : <?php echo $rowstudentdetails['userid']; ?></p>
            <p><b>Name</b> : <?php echo $rowstudentdetails['name']; ?></p>
            <p><b>Session</b> : <?php echo $rowstudentdetails['session']; ?></p>
            <p><b>Blood</b> : <?php echo $rowstudentdetails['blood']; ?></p>
            <p><b>Email</b> : <?php echo $rowstudentdetails['email']; ?></p>
          </div>
          <hr>
          <p class="rfont"><b>ADDRESS</b></p>
          <div style="padding-left:15px;">
            <p><b>Present Address</b> : <?php echo $rowstudentdetails['present']; ?></p>
            <p><b>Permanent Address</b> : <?php echo $rowstudentdetails['permanent']; ?></p>
          </div>
          <br>
          <?php
             if($_SESSION['userid']){
                if($_SESSION['userid']!="" && $_SESSION['password']!=""){
          ?>
                <button class="w3-button w3-green w3-hover-green w3-margin-right w3-round" onclick="document.getElementById('edit').style.display='block'"><b>EDIT</b></button><button class="w3-button w3-red w3-hover-red rfont w3-text-white w3-round" onclick="document.getElementById('signout').style.display='block'"><b>SIGN OUT</b></button>
          <?php   }else{  ?>
                <span class="w3-text-gray">Edit Your Profile ? Please Login. </span><button class="w3-button w3-orange w3-hover-orange rfont w3-text-white w3-round" onclick="document.getElementById('signin').style.display='block'"><b><i class="fas fa-chevron-circle-right"></i> SIGN IN</b></button>
          <?php   }}else{ ?>
            <span class="w3-text-gray">Edit Your Profile ? Please Login. </span><button class="w3-button w3-orange w3-hover-orange rfont w3-text-white w3-round" onclick="document.getElementById('signin').style.display='block'"><b><i class="fas fa-chevron-circle-right"></i> SIGN IN</b></button>
          <?php }  ?>
          <br><br>
        </div>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
