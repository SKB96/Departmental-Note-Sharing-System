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
      <a href="gallery.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Gallery >></b></p></a>
      <a href="sports.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Sports</b></p></a>
      <a href="achievements.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Achievements</b></p></a>
      <a href="workshop.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Workshop & Seminer</b></p></a>
    </div>
    <div class="w3-col m8 w3-padding">
      <div class="w3-border w3-padding-16 w3-light-grey">
        <div class="w3-row w3-row-padding">
        <!--extract notice board start-->
        <?php
           $sqlGallery="SELECT * from newgallery order by n desc";
           $resultGallery=mysqli_query($con,$sqlGallery);
           while($rowGallery = $resultGallery->fetch_assoc()){
        ?>
        <!--extract notice board end-->
        <div class="w3-third w3-container w3-margin-bottom w3-light-grey">
          <img src="uploads/gallery/<?php echo $rowGallery['image']; ?>" style="width:100%; cursor:pointer;" onclick="onClick(this)" alt="<?php echo $rowGallery['text']; ?>">
          <div class="w3-container w3-white">
            <p><?php echo $rowGallery['text']; ?><br><span class="w3-tiny w3-text-gray"><?php echo $rowGallery['date']; ?>, <?php echo $rowGallery['time']; ?></span></p>
          </div>
        </div>
        <?php
          }
        ?>
        </div>
      </div>
    </div>
    <!-- Modal for full size images on click-->
    <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
      <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
      <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
        <img id="img01" class="w3-image">
        <p id="caption"></p>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<script>
  // Modal Image Gallery
  function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
  }
</script>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
