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
      <a href="note.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Subjects</b></p></a>
      <a href="batch.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-text-black"><b>Batch >></b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <p class="rfont"><b>ALL BATCH</b></p>
        <hr>
        <ul style="list-style-type: circle;">
          <?php
          	 $sqlBatch="SELECT * from batch order by n asc";
          	 $resultBatch=mysqli_query($con,$sqlBatch);
             while($rowBatch = $resultBatch->fetch_assoc()){
          ?>
          <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
            <input type="text" name="batchName" value="<?php echo $rowBatch['session']; ?>" style="display: none;">
            <li><button class="w3-button w3-hover-white" name="academicbatch">CSE <?php echo $rowBatch['session']; ?> Batch</button></li>
          </form>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
