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
      <a href="achievements.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Achievements</b></p></a>
      <a href="workshop.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-gray w3-hover-text-black"><b>Workshop & Seminer</b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <h2 class="w3-center rfont"><b>Dept. of Computer Science and Engineering</b></h2>
        <div class="w3-content w3-section" >
          <img class="mySlides" src="gallery/slides/a.jpg" style="width:100%">
          <img class="mySlides" src="gallery/slides/b.jpg" style="width:100%">
          <img class="mySlides" src="gallery/slides/c.jpg" style="width:100%">
        </div>
        <div class="w3-row">
          <h5 class="w3-center rfont w3-border-bottom w3-text-gray"><b>Message From Chairman</b></h5>
          <div class="w3-col m4 w3-card w3-margin">
              <img src="gallery/teacher/demo.jpg" width="100%" alt="Chairman">
              <footer class="w3-padding rfont">
                <b>Dr. Syed Md. Galib</b><br>
                <span class="w3-tiny w3-text-grey"><b>Associate Professor and Chairman</b></span><br>
                <span class="w3-tiny w3-text-grey"><b>Jessore University of Science and Technology</b></span><br>
                <span class="w3-tiny w3-text-grey"><b>Jessore, Bangladesh</b></span>
              </footer>
          </div>
          <p style="text-align: justify; font-size: 15px; padding: 15px; color:gray;">It is my great pleasure to invite you to explore the Jessore University of Science and Technology (JUST) online through our website. Contribution of science and technology for developing a nation is well known to all. To meet up the diversified demand of people, information and communication technology and biological sciences are playing the key role. University is the most suitable place for education and research. Universities are playing a vital role in building efficient manpower for the development of the country as well as for the global need. With a view to imparting science and technology oriented education in Bangladesh, the Jessore University of Science & Technology was established in 2007 by the Shadhinota Shorok (Independence Road) in Jessore district.
          </div>
        </div>
        <script>
        var myIndex = 0;
        carousel();

        function carousel() {
            var i;
            var x = document.getElementsByClassName("mySlides");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
            }
            myIndex++;
            if (myIndex > x.length) {myIndex = 1}
            x[myIndex-1].style.display = "block";
            setTimeout(carousel, 3000); // Change image every 2 seconds
        }
        </script>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
