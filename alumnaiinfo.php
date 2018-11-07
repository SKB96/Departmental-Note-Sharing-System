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
         $sqlBatch="SELECT * from batch where status='alumnai' order by n asc";
         $resultBatch=mysqli_query($con,$sqlBatch);
         while($rowBatch = $resultBatch->fetch_assoc()){
      ?>
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <input type="text" name="batchName" value="<?php echo $rowBatch['session']; ?>" style="display: none;">
        <p class="rfont w3-small w3-bar w3-text-black"><b><button class="w3-btn" name="albatch">CSE <?php echo $rowBatch['session']; ?> Batch</button></b></p>
      </form>
      <?php
        }
        $session=$_SESSION['batchname'];
      ?>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <p class="rfont" style="text-transform: uppercase; "><b>Student Information, <?php echo $session; ?> Batch</b></p>
        <hr>
        <div class="w3-row">
        <!--extract notice board start-->
        <?php
           $session=$_SESSION['batchname'];
        	 $sqlstudentinfo="SELECT * from signin where session='$session' order by userid asc";
        	 $resultstudentinfo=mysqli_query($con,$sqlstudentinfo);
           while($rowstudentinfo = $resultstudentinfo->fetch_assoc()){
        ?>
        <!--extract notice board end-->
          <div class="w3-col m6 w3-padding">
            <div class="w3-card">
              <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <input type="text" name="studentroll" value="<?php echo $rowstudentinfo['userid']; ?>" style="display: none;">
                <button class="w3-btn w3-padding-16 w3-block w3-left-align" name="alumnaidetails"><?php echo $rowstudentinfo['userid']; ?> - <?php echo $rowstudentinfo['name']; ?></button>
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
