<?php include "inc/database.php"; ?><!--include database source-->
<?php include "inc/head.php"; ?><!--include head source-->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<!--page body start-->
<div class="">
  <div class="w3-row">
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
    <div class="w3-col m2 w3-container w3-padding">
      <form action="/search" method="GET">
        <input type="text" id="search_text" class="w3-input w3-border w3-round" placeholder="Search subject">
      </form>
      <br>
      <p class="rfont w3-small w3-margin-top"><b>CATAGORIES</b></p>
      <a href="note.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-margin-top w3-text-black"><b>Subjects >></b></p></a>
      <a href="batch.php" style="text-decoration: none;" > <p class="rfont w3-small w3-bar w3-text-gray w3-hover-text-black"><b>Batch</b></p></a>
    </div>
    <div class="w3-col m8 w3-container w3-padding">
      <div class="w3-border w3-padding-large">
        <p class="rfont" style="text-transform: uppercase; "><b>CSE related subjects</b></p>
        <hr>
        <div class="w3-row">
          <div id="result" style="text-transform: uppercase; ">

          </div>
        </div>
      </div>
    </div>
    <div class="w3-col m1 w3-hide-small"><p><br></p></div>
  </div>
  <br>
</div>
<script>
 $(document).ready(function(){

  load_data();

  function load_data(query)
  {
   $.ajax({
    url:"fetchsearch.php",
    method:"POST",
    data:{query:query},
    success:function(data)
    {
     $('#result').html(data);
    }
   });
  }
  $('#search_text').keyup(function(){
   var search = $(this).val();
   if(search != '')
   {
    load_data(search);
   }
   else
   {
    load_data();
   }
  });
 });
</script>
<!--page body end-->
<?php include "inc/footer.php"; ?><!--include head source-->
