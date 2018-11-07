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
      <a href="information.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top  w3-text-gray w3-hover-text-black"><b>Student Information</b></p></a>
      <a href="teacherinfo.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Teacher Information >></b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <p class="rfont"><b>TEACHER INFORMATION</b></p>
        <hr>
        <div class="w3-row">
          <?php
          	 $sqlTeacher="SELECT * from teacher order by n desc";
          	 $resultTeacher=mysqli_query($con,$sqlTeacher);
             while($rowTeacher = $resultTeacher->fetch_assoc()){
          ?>
          <div class="w3-col m4 w3-padding">
              <div class="w3-card-4">
                <img src="gallery/teacher/<?php echo $rowTeacher['image']; ?>" width="100%" alt="Norway">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                  <div class="w3-container w3-light-grey">
                    <h3><b><?php echo $rowTeacher['name']; ?></b></h3>
                    <p><?php echo $rowTeacher['designation']; ?></p>
                    <input type="text" name="teacheremail" value="<?php echo $rowTeacher['email']; ?>" style="display:none;" />
                    <button class="w3-button w3-margin-bottom w3-orange w3-round w3-text-light-grey" name="teacherdetails">VIEW PROFILE</button>
                  </div>
                </form>
              </div>
           </div>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
