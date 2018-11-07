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
      <a href="notice.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Notice</b></p></a>
      <a href="event.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Events</b></p></a>
      <a href="gallery.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Gallery</b></p></a>
      <a href="sports.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Sports</b></p></a>
      <a href="achievements.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Achievements >></b></p></a>
      <a href="workshop.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Workshop & Seminer</b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <p class="rfont"><b>RECENT ACHIEVEMENTS NEWS</b></p>
        <hr>
        <!--extract notice board start-->
        <?php
        	 $sqlNotice="SELECT * from newevent where type='achievements' order by n desc";
        	 $resultNotice=mysqli_query($con,$sqlNotice);
           while($rowNotice = $resultNotice->fetch_assoc()){
        ?>
        <!--extract notice board end-->
        <div class="w3-border w3-padding">
          <p class="w3-tiny w3-text-gray"><?php echo $rowNotice['date']; ?>, <?php echo $rowNotice['time']; ?></p>
          <p><?php echo $rowNotice['text']; ?></p>
          <?php
            $image=$rowNotice['image'];
            if($image!=""||$image!=null){
          ?>
            <img src="uploads/event/<?php echo $rowNotice['image']; ?>" width="100%">
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
